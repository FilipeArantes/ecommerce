<?php

namespace app\model;
use library\crud\Crud;

class LoginModel extends Crud
{
    public function logar($email, $senha)
    {
        $this->_select("usuario","email", $email, "senha", $senha);
    }
}
