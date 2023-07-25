<?php

namespace app\controllers;

use app\model\CarrinhoModel;

class CarrinhoController
{
    public function __construct(
        private $model = new CarrinhoModel()
    ) {
    }

    public function store($params)
    {
        return $this->model->save($params);
    }

    public function index($id)
    {
        return $this->model->index('carrinho', 'produto', 'id_produto', 'id', 'id_usuario', $id);
    }

    public function destroy($idCarrinho, $idProduto)
    {
        return $this->model->remove('carrinho', 'id_carrinho', $idCarrinho, 'id_produto', $idProduto);
    }

    public function sum($id)
    {
        return $this->model->sum('carrinho', 'preco_produto', $id, 'id_usuario');
    }
}
