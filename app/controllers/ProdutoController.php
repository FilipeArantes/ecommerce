<?php

namespace app\controllers;

use app\model\ProdutoModel;

class ProdutoController extends Controller
{
    public function __construct(
        private $model = new ProdutoModel()
    ) {
    }

    public function index(): array
    {
        return $this->model->getAll();
    }

    public function show(string $id): array
    {
        return $this->model->detail('produto', $id, 'id');
    }

    public function store(array $params): string
    {
        return $this->model->save($params);
    }

    public function update(string $id, array $params): string
    {
        return $this->model->update('produto', $params, 'id', $id);
    }

    public function destroy(string $id): string
    {
        return $this->model->delete('produto', 'id', $id);
    }
}
