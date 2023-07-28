<?php

namespace app\controllers;

use app\model\LoginModel;
use app\traits\VerificarLogin;

class LoginController extends Controller
{
    use VerificarLogin;

    public function __construct(
        private $model = new LoginModel()
    ) {
    }

    public function logar(array $params): object
    {
        return $this->model->logar($params['email'], $params['senha']);
    }
}
