<?php

namespace app\model;

use app\token\Token;
use app\traits\VerificarLogin;
use core\responses\exceptions\AppError;
use InvalidArgumentException;
use library\crud\Crud;

class LoginModel extends Crud 
{
    use VerificarLogin;

    public function logar(string $email, string $senha)
    {
        $hashSenha = $this->pegarHash($email);
        $senhaCorreta = password_verify($senha, $hashSenha);
        $verificacao = $this->verificar($email);
        if (!$verificacao) {
            http_response_code(404);
            throw new AppError('Email não encontrado, tente novamente');
        }
        if (!$senhaCorreta) {
            http_response_code(403);
            throw new AppError('A senha está incorreta, tente novamente');
        }

        $token = new Token();
        $token->create();
    }
}
