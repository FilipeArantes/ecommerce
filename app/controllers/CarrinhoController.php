<?php

namespace app\controllers;

use app\model\CarrinhoModel;

class CarrinhoController
{
    public function __construct(
        private $model = new CarrinhoModel()
    ) {
    }

    public function store(array $params): string
    {
        return $this->model->save($params);
    }

    public function index(string $id): array
    {
        return $this->model->index('carrinho', 'produto', 'id_produto', 'id', 'id_usuario', $id);
    }

    public function destroy(string $idCarrinho, string $idProduto):string
    {
        return $this->model->remove('carrinho', 'id_carrinho', $idCarrinho, 'id_produto', $idProduto);
    }

    public function sum(string $id): array
    {
        return $this->model->sum('carrinho', 'preco_produto', $id, 'id_usuario');
    }
}
