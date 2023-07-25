<?php

namespace library\crud;

class Crud
{
    public function __construct(
        protected $db = new \PDO('pgsql:host=localhost;port=5432;dbname=teste;user=postgres;password=@postgres')
    ) {
    }

    public function _select(string $table, string $condition = '', string $value = '', string $secondCondition = '', string $secondValue = '', string $column = '*'): array
    {
        $select = new Select();

        return $select->_select($table, $condition, $value, $secondCondition, $secondValue, $column);
    }

    public function _selectUnique(string $table, string $condition = '', string $value = '', string $secondCondition = '', string $secondValue = '', string $column = '*'): array
    {
        $select = new Select();

        return $select->_select($table, $condition, $value, $secondCondition, $secondValue, $column, true);
    }

    public function _selectCount(string $table): array
    {
        $selectCount = new Select();

        return $selectCount->_selectCount($table);
    }

    public function _selectJoin(string $firstTable, string $secondTable, string $condition, string $secondCondition, string $where = '', string $value = ''): array
    {
        $selectJoin = new Select();

        return $selectJoin->_selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where, $value);
    }

    public function _selectSum(string $table, string $column, string $id = '', string $condition = ''): array
    {
        $selectSum = new Select();

        return $selectSum->_selectSum($table, $column, $id, $condition);
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

    public function _deleteDesc($table, $condition, $value)
    {
        $delete = new Delete();

        return $delete->_deleteDesc($table, $condition, $value);
    }

    public function _deleteCart($table, $condition, $id, $secondCondition, $secondId)
    {
        $delete = new Delete();

        return $delete->_deleteCart($table, $condition, $id, $secondCondition, $secondId);
    }

    public function _update($table, $data, $condition, $id, $params = [])
    {
        $update = new Update();

        return $update->_update($table, $data, $condition, $id, $params = []);
    }
}
