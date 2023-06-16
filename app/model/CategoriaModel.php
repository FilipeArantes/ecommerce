<?php

namespace app\model;

use library\crud\Crud;
use library\crud\Select;

class CategoriaModel extends Crud
{
    public function index($table, $column)
    {
        return $this->_select($table, $column);
    }

    public function save($params)
    {
        return $this->_insert('produto', $params);
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
