<?php

namespace app\model;
use library\crud\Crud;

class AvaliacaoModel extends Crud
{
    public function getAll()
    {
        return $this->_select('avaliacao');
    }

    public function save($data)
    {
        return $this->_insert('avaliacao', $data);
    }

    public function delete($table, $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }
}