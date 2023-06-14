<?php

namespace Routes\teste;

use app\controllers\{CategoriaController, ContactController, DescontoController, EnderecoController, HomeController, LoginController, PedidoController, ProdutoController};
use app\Middleware\JWTMiddleware;
use Routes\teste\RoteadorAbstract;

class Router extends RoteadorAbstract
{
    public function __construct()
    {
        // $this->adicionarRota('GET', '/', HomeController::class, 'index');
        // $this->adicionarRota('GET', '/categoria', CategoriaController::class, 'index');
        // $this->adicionarRota('POST', '/categoria', CategoriaController::class, 'store');
        // $this->adicionarRota('GET', '/contato', ContactController::class, 'index');
        $this->adicionarRota('POST', '/contato', ContactController::class, 'store');
        // $this->adicionarRota('POST', '/desconto', DescontoController::class, 'store');
        // $this->adicionarRota('POST', '/endereco', EnderecoController::class, 'store');
        // $this->adicionarRota('DELETE', '/desconto/{id}', DescontoController::class, 'destroy');
        // $this->adicionarRota('POST', '/pedido/{id}', PedidoController::class, 'store');
        // $this->adicionarRota('GET', '/produto', ProdutoController::class, 'index');
        // $this->adicionarRota('GET', '/produto/{id}', ProdutoController::class, 'show');
        $this->adicionarRota('POST', '/login', LoginController::class, 'logar');
        $this->adicionarRota('POST', '/produto', ProdutoController::class, 'store', JWTMiddleware::class);
    }
}