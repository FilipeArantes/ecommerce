<?php

namespace app\controllers;

use app\model\CategoriaModel;

class CategoriaController
{
    public function __construct(
        private $model = new CategoriaModel()
    ) {
    }

    public function index(): array
    {
        return $this->model->index('categoria');
    }

    public function store(array $params): string
    {
        return $this->model->save($params);
    }

    public function update(string $id, array $params): string
    {
        return $this->model->update('categoria', $params, 'id', $id);
    }

    public function destroy(string $id): string
    {
        return $this->model->delete('categoria', 'id', $id);
    }
}
