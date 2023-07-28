<?php

namespace app\controllers;

use app\model\ItensPedidoModel;

class ItensPedidoController extends Controller
{
    public function __construct(
        private $model = new ItensPedidoModel()
    ) {
    }

    public function store(array $params): array
    {
        return $this->model->save($params);
    }
}
