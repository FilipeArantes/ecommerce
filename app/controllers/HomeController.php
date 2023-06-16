<?php

namespace app\controllers;

use app\model\HomeModel;

class HomeController extends Controller
{
    public function __construct(
        private $model = new HomeModel()
    ) {
    }

    public function index()
    {
        return $this->model->getAll();
    }
}
