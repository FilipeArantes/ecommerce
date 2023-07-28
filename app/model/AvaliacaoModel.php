<?php

namespace app\model;
use library\crud\Crud;

class AvaliacaoModel extends Crud
{
    public function getAll():  array| \stdClass | bool
    {
        return $this->_select('comentario');
    }

    public function save(array $data): string
    {
        return $this->_insert('comentario', $data);
    }

    public function delete(string $table, string $condition, string $value): string
    {
        return $this->_delete($table, $condition, $value);
    }
}