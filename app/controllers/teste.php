<?php

function base64UrlEncode($data)
{
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}

// $header = base64UrlEncode('{"alg": "HS256, "typ": "JWT}');
// $payload = base64UrlEncode('{"sub": "'.md5(time()).'", "name": "Filipe Arantes", "iat": '.time().'}');
// $signature = base64UrlEncode(
//     hash_hmac('sha256', $header.'.'.$payload, 'FILIEP', true)
// );
// $token = $header.'.'.$payload.'.'.$signature;
// print $token;

$token = "eyJhbGciOiAiSFMyNTYsICJ0eXAiOiAiSldUfQ.eyJzdWIiOiAiMTQ0MTM0OTQyNTVhNWQwOGNjODYwNGM3YWJhYzQyODAiLCAibmFtZSI6ICJGaWxpcGUgQXJhbnRlcyIsICJpYXQiOiAxNjg2Njc2MDgyfQ.23CpS7GWnI4KDb62H01HPFX965tH9ybDiUxIRA9Gqfg";

$parts = explode('.', $token);

$signature = base64UrlEncode(
    hash_hmac('sha256', $parts[0].'.'.$parts[1], 'FILIEP', true)
);

if ($signature = $parts[2]) {
    $payload = json_decode(
        base64_decode(
            $parts[1]
        )
    );
    // return true;
    print 'Certo token';
} else {
    print 'Errado token';
    // return false;
}
