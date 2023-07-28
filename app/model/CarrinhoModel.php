<?php

namespace app\model;

use library\crud\Crud;

class CarrinhoModel extends Crud
{
    public function save(array $data): string
    {
        return $this->_insert('carrinho', $data);
    }

    public function index(string $firstTable, string $secondTable, string $condition, string $secondCondition, string $where, string $value): array
    {
        return $this->_selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where, $value);
    }

    public function remove(string $table, string $condition, string $idCarrinho, string $secondCondition, string $idProduto): string
    {
        return $this->_deleteCart($table, $condition, $idCarrinho, $secondCondition, $idProduto);
    }

    public function sum(string $table, string $column, string $id, string $condition): array
    {
        return $this->_selectSum($table, $column, $id, $condition);
    }
}
