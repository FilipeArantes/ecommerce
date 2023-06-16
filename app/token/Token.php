<?php

namespace app\token;
use app\traits\Base64UrlEncode;

class Token
{
    use Base64UrlEncode;

    public function __construct(
        private string $key = "FILIEP"
    ) {
    }

    public function create(string $email, string $senha): string
    {
        if ($email == 'admin' && $senha == 'admin') {
            $this->key = 'admin';
        }
        $header = $this->base64UrlEncode('{"alg": "HS256, "typ": "JWT}');
        $payload = $this->base64UrlEncode('{"sub": "'.md5(time() + 60 * 60).'", "name": "Filipe Arantes", "iat": '.time().'}');
        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', $header.'.'.$payload, $this->key, true)
        );

        return print $header.'.'.$payload.'.'.$signature;
    }

    
}
