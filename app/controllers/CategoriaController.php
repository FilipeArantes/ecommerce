<?php

namespace app\controllers;

use app\model\CategoriaModel;

class CategoriaController
{
    public function __construct(
        private $model = new CategoriaModel()
    ) {
    }

    public function index()
    {
        return $this->model->index('categoria');
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function update($id, $params)
    {
        return $this->model->update('categoria', $params, 'id', $id);
    }

    public function destroy($id)
    {
        return $this->model->delete('categoria', 'id', $id);
    }
}
