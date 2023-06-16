<?php

namespace app\model;

use library\crud\Crud;

class CarrinhoModel extends Crud
{
    public function save($data)
    {
        return $this->_insert('carrinho', $data);
    }

    public function index($firstTable, $secondTable, $condition, $secondCondition, $where, $value)
    {
        return $this->_selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where, $value);
    }
}
