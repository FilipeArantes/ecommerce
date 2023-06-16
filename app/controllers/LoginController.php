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

    public function logar(array $params)
    {
        // $teste = password_verify();
        // $verificacao = $this->verificar($params['email'], $params['senha']);
        // if (!$verificacao) {
        //     return http_response_code(404);
        // }

        return $this->model->logar($params['email'], $params['senha']);
    }
}
