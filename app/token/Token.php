<?php

namespace app\token;

class Token
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function create()
    {
        $header = $this->base64UrlEncode('{"alg": "HS256, "typ": "JWT}');
        $payload = $this->base64UrlEncode('{"sub": "'.md5(time() + 60 * 60).'", "name": "Filipe Arantes", "iat": '.time().'}');
        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', $header.'.'.$payload, $this->key, true)
        );

        return print $header.'.'.$payload.'.'.$signature;
    }

    public function base64UrlEncode($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }
}
