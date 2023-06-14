<?php

namespace app\controllers;

use app\model\LoginModel;
use app\token\Token;

class LoginController extends Controller
{
    public function __construct(
        private $model = new LoginModel()
    ) {
    }

    public function logar($params)
    {
        $this->model->logar($params["email"], $params["senha"]);
        $token = new Token();
        $token->create();
    }
}
