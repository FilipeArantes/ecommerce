<?php

namespace app\model;

use app\traits\EmailJaUsado;
use library\crud\Crud;

class ContactModel extends Crud
{
    use EmailJaUsado;

    public function save($params)
    {
        $hashSenha = password_hash($params['senha'], PASSWORD_BCRYPT);
        if ($this->verificarEmail($params['email'])) {
            throw new \InvalidArgumentException('Email já esta em uso');
        }

        $teste = new Crud();
        $arrValores = [
            'nome' => $params['nome'],
            'email' => $params['email'],
            'senha' => $hashSenha,
        ];
        $teste->_insert('usuario', $arrValores);
    }
}
