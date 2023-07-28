<?php

namespace app\controllers;

use app\model\UsuarioModel;
use core\responses\exceptions\AppError;
use library\crud\Crud;

class UsuarioController extends Controller
{
    public function __construct(
        private $model = new UsuarioModel()
    ) {
    }

    public function store($params): \stdClass
    {
        $select = new Crud();
        if (!$params['nome']) {
            throw new AppError('Insira um nome valido');
        }
        if ($select->_select('usuario', 'email', $params['email'])) {
            throw new AppError('Email inválido ou já está em uso');
        }

        return $this->model->save($params);
    }
}
