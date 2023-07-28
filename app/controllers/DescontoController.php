<?php

namespace app\controllers;

use app\model\DescontoModel;

class DescontoController
{
    public function __construct(
        private $model = new DescontoModel()
    ) {
    }

    public function store(array $params): string
    {
        return $this->model->save('desconto', $params);
    }

    public function update(string $id, array $params): string
    {
        return $this->model->update('desconto', $params, 'id', $id);
    }

    public function destroy(string $id): string
    {
        return $this->model->delete('desconto', 'id', $id);
    }
}
