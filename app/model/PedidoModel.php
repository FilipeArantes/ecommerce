<?php

namespace app\model;

use library\crud\Crud;

class PedidoModel extends Crud
{
    public function checkout($table, $params)
    {
        return $this->_insert($table, $params);
        // $this->_update("produto",);
    }

    public function countPedidos($table)
    {
        return $this->_selectCount($table);
    }

    public function showOrders($table, $condition, $value)
    {
        return $this->_select($table, $condition, $value);
    }
}