<?php

namespace app\model;

use core\TratamentoImagem;
use library\crud\Crud;
use library\crud\Select;

class CategoriaModel extends Crud
{
    public function index(string $table): array
    {
        return $this->_select($table);
    }

    public function save(array $params): string
    {
        $teste = new TratamentoImagem();
        $imagemProduto = $teste->tratarImagem();
        $caminho = "http://localhost/frame/public/img/{$imagemProduto}";

        $arrDefault = [
            'nome' => $params['nome'],
            'imagem' => $caminho,
        ];

        return $this->_insert('categoria', $arrDefault);
    }

    public function delete(string $table, string $condition, string $value): string
    {
        return $this->_delete($table, $condition, $value);
    }

    public function update(string $table, array $data, string $condition, string $id): string
    {
        return $this->_update($table, $data, $condition, $id);
    }
}
