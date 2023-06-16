<?php

namespace app\controllers;

use app\model\CarrinhoModel;

class CarrinhoController
{
    public function __construct(
        private $model = new CarrinhoModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function index($id)
    {
        return $this->model->index('carrinho', 'produto', 'id_produto', 'id', 'id_usuario', $id);
    }
}
    