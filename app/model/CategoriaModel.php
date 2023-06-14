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
}
