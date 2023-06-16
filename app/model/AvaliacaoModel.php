<?php

namespace app\model;
use library\crud\Crud;

class AvaliacaoModel extends Crud
{
    public function getAll()
    {
        $this->_select('avaliacao');
    }

    public function save($data)
    {
        $this->_insert('avaliacao', $data);
    }

    public function delete($table, $condition, $value)
    {
        $this->_delete($table, $condition, $value);
    }
}