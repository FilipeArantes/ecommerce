<?php

namespace app\model;

use library\crud\Crud;

class PedidoModel extends Crud
{
    public function checkout($table, $params)
    {
        $this->_insert($table, $params);
        // $this->_update("produto",);
    }
}