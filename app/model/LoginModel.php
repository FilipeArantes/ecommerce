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

    public function logar(string $email, string $senha): object
    {
        $login = new \stdClass();
        $hashSenha = $this->pegarHash($email);
        $senhaCorreta = password_verify($senha, $hashSenha);
        $verificacao = $this->verificar($email);
        $dados = $this->_select("usuario", "email", $email);

        if (!$verificacao || !$senhaCorreta) {
            http_response_code(404);

            throw new AppError('Usuario ou senha incorretos, tente novamente');
        }
        

        $token = new Token('FILIEP');
        $login->token = $token->create();
        $login->me = $dados; // Informações do usuario

        return $login;
    }
}
