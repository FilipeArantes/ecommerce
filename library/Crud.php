<?php

namespace library\crud;

use PDO;

class Crud
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('pgsql:host=localhost;port=5432;dbname=teste;user=postgres;password=@postgres');
    }

    public function _select($table, $condition = '', $value = '', $secondCondition = '', $secondValue = '', $column = '*')
    {
        $select = new Select();
        return $select->_select($table, $condition , $value, $secondCondition, $secondValue, $column);
    }

    public function _insert($table, $arrValores)
    {
        $insert = new Insert();
        return $insert->_insert($table, $arrValores);
    }

    public function _delete($table, $condition, $value)
    {
        $delete = new Delete();
        return $delete->_delete($table, $condition, $value);
    }

    public function _update($table, $data, $condition, $params = [])
    {
        $update = new Update();
        return $update->_update($table, $data, $condition, $params = []);
    }
}
