<?php

namespace app\model;

use library\crud\Crud;

class DescontoModel extends Crud
{
    public function save($table, $params)
    {
        return $this->_insert($table, $params);
    }

    public function deletar($table, $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }
}