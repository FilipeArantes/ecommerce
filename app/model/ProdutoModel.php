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

    public function detail(string $table, string $id, string $column): array
    {
        return $this->_select($table, $column, $id);
    }

    public function save(array $arrProdutos): string
    {
        $teste = new TratamentoImagem();
        $imagemProduto = $teste->tratarImagem();
        $caminho = "http://localhost/frame/public/img/{$imagemProduto}";

        $arrDefault = [
            'id_categoria' => $arrProdutos['id_categoria'],
            'nome' => $arrProdutos['nome'],
            'descricao' => $arrProdutos['descricao'],
            'preco' => $arrProdutos['preco'],
            'quantidade_estoque' => $arrProdutos['quantidade_estoque'],
            'preco_inicial' => $arrProdutos['preco'],
            'imagem' => $caminho,
        ];

        return $this->_insert('produto', $arrDefault);
    }

    public function update(string $table, array $data, string $condition, string $id): string
    {
        return $this->_update($table, $data, $condition, $id);
    }

    public function delete(string $table, string $condition, string $value): string
    {
        return $this->_delete($table, $condition, $value);
    }
}
