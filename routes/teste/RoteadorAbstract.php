<?php

namespace Routes\teste;

abstract class RoteadorAbstract
{
    protected $rotas = [];

    public function adicionarRota($metodo, $uri, $controller, $metodoController, $middleware = false)
    {
        $this->rotas[] = [
            'metodo' => $metodo,
            'uri' => $uri,
            'controller' => $controller,
            'metodoController' => $metodoController,
            'middleware' => $middleware,
        ];
    }

    public function executar($verb, $uri)
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
                    $hasPermission = $middleware->handle($rota);
                    if (!$hasPermission) {
                        http_response_code(401);
                        print json_encode(["message" => "Não tem permissão para acessar a rota"]);
                        return;
                    }
                }

                $params = array_combine($placeholders, array_slice($matches, 1));

                $controller = new $rota['controller']();
                $data = json_decode(file_get_contents('php://input'), true);

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
                    $response = call_user_func_array([$controller, $rota['metodoController']], [current($params)]);
                }
                if ('GET' == $verb and !count($params)) {
                    $response = call_user_func_array([$controller, $rota['metodoController']], [$data]);
                }

                // http_response_code()

                // print json_encode($response);

                return;
            }
        }

        // Se não houver correspondência de rota, retornar erro 404
        http_response_code(404);

        $verbLowercase = strtolower($verb);
        print json_encode("Cannot {$verbLowercase} {$uri}");

        exit;
    }
}
