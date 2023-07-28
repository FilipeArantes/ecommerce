<?php

namespace app\Middleware;

use app\traits\Base64UrlEncode;
use core\responses\Responses;

class JWTMiddleware
{
    use Base64UrlEncode;

    private string $secretKey;
    private string $adminKey;

    public function __construct()
    {
        $this->secretKey = $_ENV['KEY'];
        $this->adminKey = $_ENV['ADMKEY'];
    }

    public function handle($isAdm = '') : bool
    {
        $token = $this->extractTokenFromRequest();

        if (!$token) {
            return Responses::unauthorized('Token de acesso não fornecido.');
        }

        if ($isAdm) {
            try {
                return $this->validateAdmToken($token);
            } catch (\Exception $e) {
                http_response_code(401);

                exit('Token de acesso inválido ou não fornecido.');
            }
        }

        try {
            return $this->validateToken($token);
        } catch (\Exception $e) {
            http_response_code(401);

            exit('Token de acesso inválido ou não fornecido.');
        }
    }

    private function extractTokenFromRequest(): string | null
    {
        $authorizationHeader = getallheaders()['Authorization'];

        if (preg_match('/Bearer\s+(.*)/', $authorizationHeader, $matches)) {
            return $matches[1];
        }

        return null;
    }

    private function validateToken(string $token): bool
    {
        $parts = explode('.', $token);

        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', $parts[0].'.'.$parts[1], $this->secretKey, true)
        );

        if ($signature == $parts[2]) {
            $payload = json_decode(
                base64_decode(
                    $parts[1]
                )
            );

            return true;
        }

        return false;
    }

    private function validateAdmToken(string $token): bool
    {
        $parts = explode('.', $token);

        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', $parts[0].'.'.$parts[1], $this->adminKey, true)
        );

        if ($signature == $parts[2]) {
            $payload = json_decode(
                base64_decode(
                    $parts[1]
                )
            );

            return true;
        }

        return false;
    }
}
