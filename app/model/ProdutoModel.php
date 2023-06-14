<?php

namespace app\model;

use library\crud\Crud;
use library\crud\Select;

class ProdutoModel extends Crud
{
    public function getAll()
    {
        return $this->_select('produto');
    }

    public function detail($table, $id, $column)
    {
        $this->_select($table, $column, $id);
    }

    public function save(array $arrProdutos)
    {
        $arrDefault = [
            'id_categoria' => $arrProdutos['id_categoria'],
            'nome' => $arrProdutos['nome'],
            'descricao' => $arrProdutos['descricao'],
            'preco' => $arrProdutos['preco'],
            'quantidade_estoque' => $arrProdutos['quantidade_estoque'],
            'preco_inicial' => $arrProdutos['preco'],
        ];

        $this->_insert('produto', $arrDefault);
    }

    public function update()
    {
        
    }

    public function delete()
    {
    }
}
