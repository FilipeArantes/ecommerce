<?php

namespace app\model;

use core\TratamentoImagem;
use library\crud\Crud;
use library\crud\Select;

class CategoriaModel extends Crud
{
    public function index($table)
    {
        return $this->_select($table);
    }

    public function save($params)
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

    public function delete($table, $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }

    public function update($table, $data, $condition, $id)
    {
        return $this->_update($table, $data, $condition, $id);
    }
}
