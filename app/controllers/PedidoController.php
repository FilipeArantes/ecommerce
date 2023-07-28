<?php

namespace app\controllers;

use app\model\PedidoModel;

class PedidoController extends Controller
{
    public function __construct(
        private $model = new PedidoModel()
    ) {
    }

    public function store(array $params): string
    {
        return $this->model->checkout('pedido', $params);
    }

    public function show(string $id): array
    {
        return $this->model->showOrders('pedido', 'id_usuario', $id);
    }

    public function count(): array
    {
        return $this->model->countPedidos('pedido');
    }

    public function recentes(): array
    {
        return $this->model->pedidosRecentes('pedido', 'itens_pedido', 'id_itens_pedido', 'id');
    }

    public function sum(): array
    {
        return $this->model->sumPedidos('itens_pedido', 'preco_produto');
    }
}
