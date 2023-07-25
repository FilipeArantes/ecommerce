<?php

namespace Routes;

use app\controllers\AvaliacaoController;
use app\controllers\CarrinhoController;
use app\controllers\CategoriaController;
use app\controllers\DescontoController;
use app\controllers\EnderecoController;
use app\controllers\HomeController;
use app\controllers\ItensPedidoController;
use app\controllers\LoginController;
use app\controllers\PedidoController;
use app\controllers\ProdutoController;
use app\controllers\UsuarioController;
use app\Middleware\JWTMiddleware;
use core\router\RoteadorAbstract;

class Router extends RoteadorAbstract
{
    public function __construct()
    {
        $this->adicionarRota('GET', '/', HomeController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('GET', '/comentario', AvaliacaoController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('POST', '/comentario', AvaliacaoController::class, 'store'/* JWTMiddleware::class */);
        $this->adicionarRota('DELETE', '/comentario/{id}', AvaliacaoController::class, 'destroy'/* JWTMiddleware::class, true */);
        $this->adicionarRota('GET', '/categoria', CategoriaController::class, 'index'/* JWTMiddleware::class */);
        $this->adicionarRota('POST', '/categoria', CategoriaController::class, 'store'/* JWTMiddleware::class, true */);
        $this->adicionarRota('PUT', '/categoria/{id}', CategoriaController::class, 'update'/* JWTMiddleware::class, true */);
        $this->adicionarRota('DELETE', '/categoria/{id}', CategoriaController::class, 'destroy'/* JWTMiddleware::class, true */);
        $this->adicionarRota('GET', '/carrinho/{id}', CarrinhoController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('GET', '/carrinhoSum/{id}', CarrinhoController::class, 'sum', JWTMiddleware::class);
        $this->adicionarRota('POST', '/carrinho', CarrinhoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('DELETE', '/carrinho/{id_a}/{id_b}', CarrinhoController::class, 'destroy', JWTMiddleware::class);
        $this->adicionarRota('POST', '/usuario', UsuarioController::class, 'store');
        $this->adicionarRota('POST', '/desconto', DescontoController::class, 'store'/* JWTMiddleware::class, true */);
        $this->adicionarRota('PUT', '/desconto/{id}', DescontoController::class, 'update', JWTMiddleware::class, true);
        $this->adicionarRota('DELETE', '/desconto/{id}', DescontoController::class, 'destroy'/* JWTMiddleware::class, true */);
        $this->adicionarRota('POST', '/endereco', EnderecoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('PUT', '/endereco', EnderecoController::class, 'update', JWTMiddleware::class);
        $this->adicionarRota('PUT', '/endereco', EnderecoController::class, 'destroy', JWTMiddleware::class);
        $this->adicionarRota('POST', '/itens', ItensPedidoController::class, 'store', JWTMiddleware::class);
        $this->adicionarRota('POST', '/login', LoginController::class, 'logar');
        $this->adicionarRota('GET', '/pedido/{id}', PedidoController::class, 'show', JWTMiddleware::class);
        $this->adicionarRota('POST', '/pedido', PedidoController::class, 'store'/* JWTMiddleware::class */);
        $this->adicionarRota('GET', '/pedidoCount', PedidoController::class, 'count');
        $this->adicionarRota('GET', '/pedidosRecentes', PedidoController::class, 'recentes');
        $this->adicionarRota('GET', '/pedidosSum', PedidoController::class, 'sum');
        $this->adicionarRota('GET', '/produto', ProdutoController::class, 'index', JWTMiddleware::class);
        $this->adicionarRota('GET', '/produto/{id}', ProdutoController::class, 'show', JWTMiddleware::class);
        $this->adicionarRota('POST', '/produto', ProdutoController::class, 'store'/* JWTMiddleware::class, true */);
        $this->adicionarRota('PUT', '/produto/{id}', ProdutoController::class, 'update'/* JWTMiddleware::class, true */);
        $this->adicionarRota('DELETE', '/produto/{id}', ProdutoController::class, 'destroy'/* JWTMiddleware::class, true */);
    }
}
