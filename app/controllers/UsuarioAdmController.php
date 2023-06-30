<?php

namespace app\controllers;

use app\model\UsuarioAdmModel;

class UsuarioAdmController extends Controller
{
    public function __construct(
        private $model = new UsuarioAdmModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->save($params);
    }
}
