<?php

namespace app\controllers;

use app\model\CategoriaModel;
use library\crud\Select;

class CategoriaController
{
    public function __construct(
        private $model = new CategoriaModel()
    ) {
    }

    public function index()
    {
        return $this->model->index('categoria', 'nome');
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
