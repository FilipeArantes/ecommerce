<?php

namespace app\model;
use library\crud\Crud;

class AvaliacaoModel extends Crud
{
    public function getAll()
    {
        return $this->_select('comentario');
    }

    public function save(array $data)
    {
        return $this->_insert('comentario', $data);
    }

    public function delete(string $table, string $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }
}