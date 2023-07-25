<?php

namespace app\model;

use library\crud\Crud;

class PedidoModel extends Crud
{
    public function checkout($table, $params)
    {
        foreach ($params as $key => $value) {
            $produtosCarrinho = $this->_select("carrinho", 'id_usuario' ,$value['produto']['id_usuario']);
        }

        foreach ($params as $key => $value) {
            // $this->_update("carrinho", );
            $produtos = $this->_selectUnique('produto', 'id', $value['produto']['id_produto']);
            $value['produto']['dados'] = json_encode($produtos);
            unset($value['produto']['id_produto']);
            unset($value['produto']['email']);
            $this->_insert($table, $value['produto']);
            // $atulizarEstoque = $this->;
        }
    }

    public function countPedidos($table)
    {
        return $this->_selectCount($table);
    }

    public function showOrders($table, $condition, $value)
    {
        return $this->_select($table, $condition, $value);
    }

    public function pedidosRecentes($table)
    {
        // return $this->_selectJoin($table,);
    }

    public function sumPedidos($table, $column)
    {
        return $this->_selectSum($table, $column);
    }
}