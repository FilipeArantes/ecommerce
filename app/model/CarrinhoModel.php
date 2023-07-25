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

    public function remove($table, $condition, $idCarrinho, $secondCondition, $idProduto)
    {
        return $this->_deleteCart($table, $condition, $idCarrinho, $secondCondition, $idProduto);
    }

    public function sum($table, $column, $id, $condition)
    {
        return $this->_selectSum($table, $column, $id, $condition);
    }
}
