<?php

namespace app\model;

use core\TratamentoImagem;
use library\crud\Crud;

class ProdutoModel extends Crud
{
    public function getAll(): array
    {
        return $this->_select('produto');
    }

    public function detail($table, $id, $column)
    {
        return $this->_select($table, $column, $id);
    }

    public function save(array $arrProdutos)
    {
        $teste = new TratamentoImagem();
        $imagemProduto = $teste->tratarImagem();
        $caminho = "http://localhost/frame/public/img/{$imagemProduto}";

        $arrDefault = [
            'id_categoria' => $arrProdutos['id_categoria'],
            'nome' => $arrProdutos['nome'],
            'descricao' => $arrProdutos['descricao'],
            'preco_produto' => $arrProdutos['preco_produto'],
            'quantidade_estoque' => $arrProdutos['quantidade_estoque'],
            'preco_inicial' => $arrProdutos['preco_produto'],
            'imagem' => $caminho,
        ];

        return $this->_insert('produto', $arrDefault);
    }

    public function update($table, $data, $condition, $id)
    {
        return $this->_update($table, $data, $condition, $id);
    }

    public function delete($table, $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }
}
