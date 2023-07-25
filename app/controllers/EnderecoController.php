<?php

namespace app\controllers;

use app\model\EnderecoModel;

class EnderecoController extends Controller
{
    public function __construct(
        private $model = new EnderecoModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function update($params, $id)
    {
        return $this->model->update('endereco', $params, 'id', $id);
    }

    public function destroy($id)
    {
        return $this->model->delete('endereco', 'id', $id);
    }
}
