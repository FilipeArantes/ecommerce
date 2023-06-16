<?php

namespace app\controllers;

use app\model\AvaliacaoModel;

class AvaliacaoController
{
    public function __construct(
        private $model = new AvaliacaoModel()
    ) {
    }

    public function index()
    {
        return $this->model->getAll();
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function destroy($id)
    {
        return $this->model->delete('avaliacao', 'id', $id);
    }
}
