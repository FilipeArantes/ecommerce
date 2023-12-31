<?php

namespace core\router;

use core\responses\exceptions\AppError;
use core\responses\Responses;
use core\TratamentoImagem;

abstract class RoteadorAbstract
{
    protected array $rotas = [];

    public function adicionarRota(string $metodo, string $uri, string $controller, string $metodoController, ?string $middleware = null , bool $admin = false): void
    {
        $this->rotas[] = [
            'metodo' => $metodo,
            'uri' => $uri,
            'controller' => $controller,
            'metodoController' => $metodoController,
            'middleware' => $middleware,
            'admin' => $admin,
        ];
    }

    public function executar(string $verb, string $uri)
    {
        foreach ($this->rotas as $rota) {
            $placeholders = [];
            $pattern = preg_replace_callback('/\{([^\}]+)\}/', function ($matches) use (&$placeholders) {
                $placeholders[] = $matches[1];

                return '([^\/]+)';
            }, $rota['uri']);

            if ($verb == $rota['metodo'] && preg_match("#^{$pattern}$#", $uri, $matches)) {
                if ($rota['middleware']) {
                    $middleware = new $rota['middleware']();
                    if ($rota['admin']) {
                        $hasPermission = $middleware->handle('admin');
                    }
                    if (!$rota['admin']) {
                        $hasPermission = $middleware->handle();
                    }
                    if (!$hasPermission) {
                        http_response_code(401);
                        print json_encode(['message' => 'Não tem permissão para acessar a rota']);

                        return;
                    }
                }

                $params = array_combine($placeholders, array_slice($matches, 1));

                $controller = new $rota['controller']();
                $data = json_decode(file_get_contents('php://input'), true);

                $hasFile = TratamentoImagem::hasFile($_FILES);
                if ($hasFile) {
                    $data = $_POST;
                }

                try {
                    if ('POST' == $verb) {
                        $response = call_user_func_array([$controller, $rota['metodoController']], [$data]);
                    }
                    if ('PUT' == $verb) {
                        $response = call_user_func_array([$controller, $rota['metodoController']], [current($params), $data]);
                    }
                    if ('GET' == $verb and count($params)) {
                        $response = call_user_func_array([$controller, $rota['metodoController']], [current($params)]);
                    }
                    if ('DELETE' == $verb and count($params)) {
                        if (count($params) === 2) {
                            $response = call_user_func_array([$controller, $rota['metodoController']], [$params['id_a'], $params['id_b']]);

                            return;
                        }
                        $response = call_user_func_array([$controller, $rota['metodoController']], [current($params)]);
                    }
                    if ('GET' == $verb and !count($params)) {
                        $response = call_user_func_array([$controller, $rota['metodoController']], [$data]);
                    }
                } catch (AppError $th) {
                    return Responses::notAcceptable($th);
                } catch (\Throwable $th) {
                    return Responses::failed($th);
                }

                print json_encode($response);

                return;
            }
        }

        $verbLowercase = strtolower($verb);

        return Responses::notFound("Cannot {$verbLowercase} {$uri}");
    }
}
