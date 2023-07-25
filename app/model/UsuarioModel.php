<?php

namespace app\model;

use app\token\Token;
use app\traits\EmailJaUsado;
use core\responses\exceptions\AppError;
use library\crud\Crud;

class UsuarioModel extends Crud
{
    use EmailJaUsado;

    public function save($params): \stdClass
    {
        $criarConta = new \stdClass();

        if ($this->verificarEmail($params['email'])) {
            throw new AppError('Email já esta em uso');
        }
        $hashSenha = password_hash($params['senha'], PASSWORD_BCRYPT);

        $teste = new Crud();
        $arrValores = [
            'nome' => $params['nome'],
            'email' => $params['email'],
            'senha' => $hashSenha,
        ];
        $teste->_insert('usuario', $arrValores);
        $dados = $this->_select('usuario', 'email', $params['email']);

        $token = new Token('FILIEP');
        $criarConta->token = $token->create();
        $criarConta->me = $dados; // Informações do usuario

        return $criarConta;
    }
}
