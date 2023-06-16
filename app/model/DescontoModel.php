<?php

namespace app\model;

use library\crud\Crud;

class DescontoModel extends Crud
{
    public function save($table, $params)
    {
        return $this->_insert($table, $params);
    }

    public function update($table, $data, $condition, $id)
    {
        return $this->_update($table, $data, $condition, $id);
    }

    public function delete($table, $condition, $value)
    {
        return $this->_delete($table, $condition, $value);
    }
}