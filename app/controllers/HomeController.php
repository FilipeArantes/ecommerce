<?php

namespace app\controllers;

use app\model\HomeModel;
use PDO;

class HomeController extends Controller
{
    public function __construct(
        private $model = new HomeModel()
    ) {
    }

    public function index()
    {
        $db = new \PDO('pgsql:host=localhost;port=5432;dbname=teste;user=postgres;password=@postgres');

        return $this->model->getAll($db);
    }
}
