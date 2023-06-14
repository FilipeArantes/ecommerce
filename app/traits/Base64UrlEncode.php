<?php

namespace app\traits;

trait Base64UrlEncode
{
    protected function base64UrlEncode($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }
}
