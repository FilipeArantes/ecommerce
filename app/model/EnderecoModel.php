<?php

namespace app\model;

use library\crud\Crud;

class EnderecoModel extends Crud
{
    public function save(array $params): string
    {
        return $this->_insert('endereco', $params);
    }

    public function update(string $table, array $data, string $condition, string $id): string
    {
        return $this->_update($table, $data, $condition, $id);
    }

    public function delete(string $table, string $condition, string $value): string
    {
        return $this->_delete($table, $condition, $value);
    }
}
