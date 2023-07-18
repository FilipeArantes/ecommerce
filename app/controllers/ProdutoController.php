<?php

namespace app\controllers;

use app\model\ProdutoModel;

class ProdutoController extends Controller
{
    public function __construct(
        private $model = new ProdutoModel()
    ) {
    }

    public function index()
    {
        return $this->model->getAll();
    }

    public function show($id)
    {
        return $this->model->detail('produto', $id, 'id');
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function update($id, $params)
    {
        return $this->model->update('produto', $params, 'id', $id);
    }

    public function destroy($id)
    {
        return $this->model->delete('produto', 'id', $id);
    }
}
