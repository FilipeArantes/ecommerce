<?php

namespace app\controllers;

use app\model\PedidoModel;

class PedidoController extends Controller
{
    public function __construct(
        private $model = new PedidoModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->checkout("pedido", $params);
    }
}