<?php

namespace core\responses;

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
        print json_encode(["message" => "$message"]);
    }

    public static function unauthorized(\Throwable $error): void
    {
        http_response_code(401);
        print json_encode(['message' => $error->getMessage()]);
    }
}
