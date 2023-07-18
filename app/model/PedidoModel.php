<?php

namespace app\model;

use library\crud\Crud;

class PedidoModel extends Crud
{
    public function checkout($table, $params)
    {
        foreach ($params as $key => $value) {
            $this->_insert($table, $value);
        }
        // $atulizarEstoque = $this->;
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
        return $this->_selectJoin($table,);
    }

    public function sumPedidos($table, $column)
    {
        return $this->_selectSum($table, $column);
    }
}