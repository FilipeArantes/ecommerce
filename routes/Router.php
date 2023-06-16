<?php

namespace Routes;

use app\controllers\{AvaliacaoController, CategoriaController, ContactController, DescontoController, EnderecoController, HomeController, LoginController, PedidoController, ProdutoController};
use app\Middleware\JWTMiddleware;
use core\router\RoteadorAbstract;

class Router extends RoteadorAbstract
{
    public function __construct()
    {
        $this->adicionarRota('GET', '/', HomeController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('GET', '/avaliacao', AvaliacaoController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('POST', '/avaliacao', AvaliacaoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('DELETE', '/avaliacao', AvaliacaoController::class, 'destroy', JWTMiddleware::class, true);
        $this->adicionarRota('GET', '/categoria', CategoriaController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('POST', '/categoria', CategoriaController::class, 'store', JWTMiddleware::class, true);
        $this->adicionarRota('PUT', '/categoria', CategoriaController::class, 'update', JWTMiddleware::class, true);
        $this->adicionarRota('DELETE', '/categoria/{id}', CategoriaController::class, 'destroy', JWTMiddleware::class, true);
        $this->adicionarRota('GET', '/carrinho/{id}', CategoriaController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('POST', '/carrinho', CategoriaController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('POST', '/contato', ContactController::class, 'store');
        $this->adicionarRota('POST', '/desconto', DescontoController::class, 'store', JWTMiddleware::class, true);
        $this->adicionarRota('PUT', '/desconto/{id}', DescontoController::class, 'update', JWTMiddleware::class, true);
        $this->adicionarRota('DELETE', '/desconto/{id}', DescontoController::class, 'destroy', JWTMiddleware::class, true);
        $this->adicionarRota('POST', '/endereco', EnderecoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('PUT', '/endereco', EnderecoController::class, 'update', JWTMiddleware::class);
        $this->adicionarRota('PUT', '/endereco', EnderecoController::class, 'destroy', JWTMiddleware::class);
        $this->adicionarRota('POST', '/login', LoginController::class, 'logar');
        $this->adicionarRota('POST', '/pedido', PedidoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('GET', '/produto', ProdutoController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('GET', '/produto/{id}', ProdutoController::class, 'show', JWTMiddleware::class);
        $this->adicionarRota('POST', '/produto', ProdutoController::class, 'store', JWTMiddleware::class, true);
        $this->adicionarRota('PUT', '/produto', ProdutoController::class, 'update', JWTMiddleware::class, true);
        $this->adicionarRota('GET', '/produto', ProdutoController::class, 'destroy', JWTMiddleware::class, true);
    }
}