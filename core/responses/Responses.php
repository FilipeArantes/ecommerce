<?php

namespace core\responses;

use core\responses\exceptions\AppError;

class Responses
{
    public static function failed(\Throwable $error): void
    {
        http_response_code(500);
        print json_encode(['message' => $error->getMessage()]);
    }

    public static function created($message): void
    {
        http_response_code(201);
        print json_encode(['message' => $message]);
    }

    public static function ok($message): void
    {
        http_response_code(200);
        print json_encode(['message' => $message]);
    }

    public static function unauthorized($message): void
    {
        http_response_code(401);
        print json_encode(['message' => $message]);
    }

    public static function notAcceptable(AppError $error): void
    {
        http_response_code(406);
        print json_encode(['message' => $error->getMessage()]);
    }

    public static function notFound(string $message): void
    {
        http_response_code(404);
        print json_encode(['message' => $message]);
    }
}
