<?php

namespace app\controllers;

use app\model\EnderecoModel;

class EnderecoController extends Controller
{
    public function __construct(
        private $model = new EnderecoModel()
    ) {
    }

    public function store(array $params): string
    {
        return $this->model->save($params);
    }

    public function update(array $params, string $id): string
    {
        return $this->model->update('endereco', $params, 'id', $id);
    }

    public function destroy(string $id): string
    {
        return $this->model->delete('endereco', 'id', $id);
    }
}
