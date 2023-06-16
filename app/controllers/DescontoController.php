<?php

namespace app\controllers;

use app\model\DescontoModel;

class DescontoController
{
    public function __construct(
        private $model = new DescontoModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->save('desconto', $params);
    }

    public function update($id, $params)
    {
        return $this->model->update('desconto', $params, 'id', $id);
    }

    public function destroy($id)
    {
        return $this->model->delete('desconto', 'id', $id);
    }
}
