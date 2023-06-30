<?php

use core\router\Config;
use Routes\Router;

require_once './../vendor/autoload.php';

header('Content-Type: application/json');

Config::setCors();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$rotas = new Router();
$rotas->executar($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);