<?php

namespace app\controllers;

use app\model\AvaliacaoModel;

class AvaliacaoController
{
    public function __construct(
        private $model = new AvaliacaoModel()
    ) {
    }

    public function index(): array| \stdClass | bool
    {
        return $this->model->getAll();
    }

    public function store(array $params): string
    {
        return $this->model->save($params);
    }

    public function destroy(string $id): string
    {
        return $this->model->delete('avaliacao', 'id', $id);
    }
}
