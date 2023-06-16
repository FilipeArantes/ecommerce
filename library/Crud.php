<?php

namespace library\crud;

class Crud
{
    public function __construct(
        protected $db = new \PDO('pgsql:host=localhost;port=5432;dbname=teste;user=postgres;password=@postgres')
    ) {
    }

    public function _select($table, $condition = '', $value = '', $secondCondition = '', $secondValue = '', $column = '*')
    {
        $select = new Select();

        return $select->_select($table, $condition, $value, $secondCondition, $secondValue, $column);
    }

    public function _selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where = '', $value = '')
    {
        $selectJoin = new Select();

        return $selectJoin->_selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where, $value);
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

    public function _update($table, $data, $condition, $id, $params = [])
    {
        $update = new Update();

        return $update->_update($table, $data, $condition, $id, $params = []);
    }
}
