<?php

namespace app\model;

use library\crud\Crud;

class DescontoModel extends Crud
{
    public function save(string $table, array $params): string
    {
        return $this->_insert($table, $params);
    }

    public function update(string $table, array $data, string $condition,string $id): string
    {
        return $this->_update($table, $data, $condition, $id);
    }

    public function delete(string $table, string $condition, string $value): string
    {
        return $this->_deleteDesc($table, $condition, $value);
    }
}