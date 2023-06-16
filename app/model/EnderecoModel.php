<?php

namespace app\model;

use library\crud\Crud;

class EnderecoModel extends Crud
{
    public function save($params)
    {
        return $this->_insert('endereco', $params);
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
