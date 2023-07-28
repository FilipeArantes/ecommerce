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
        $dados = $this->_select('usuario', 'email', $email);
        $hashSenha = $this->pegarHash($email);
        $senhaCorreta = password_verify($senha, $hashSenha);
        $verificacao = $this->verificar($email);

        if ($dados[0]['bo_admin'] == true && $senhaCorreta && $verificacao) {
            $login = new \stdClass();

            $tokenAdm = new Token('admin');
            $login->token = $tokenAdm->create();
            $login->me = $dados[0]['bo_admin']; // Informações do usuario

            return $login;
        }

        $hashSenha = $this->pegarHash($email);
        $senhaCorreta = password_verify($senha, $hashSenha);
        $login = new \stdClass();

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
