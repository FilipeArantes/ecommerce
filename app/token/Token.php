<?php

namespace app\token;
use app\traits\Base64UrlEncode;

class Token
{
    use Base64UrlEncode;

    public function __construct(
        private string $key
    ) {
    }

    public function create(): string
    {
        $header = $this->base64UrlEncode('{"alg": "HS256, "typ": "JWT}');
        $payload = $this->base64UrlEncode('{"sub": "'.md5(time() + 60 * 60).'", "name": "Filipe Arantes", "iat": '.time().'}');
        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', $header.'.'.$payload, $this->key, true)
        );

        return print $header.'.'.$payload.'.'.$signature;
    }

    
}
