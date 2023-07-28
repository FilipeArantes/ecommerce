<?php

namespace library\crud;

class Delete extends Crud
{
    public function _delete(string $table, string $condition, int $id): int
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE {$table} set bo_ativo = false WHERE {$condition} = {$id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function _deleteDesc(string $table, string $column, string $value): string
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM {$table} WHERE {$column} = {$value}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function _deleteCart($table, $condition, $id, $secondCondition, $secondId)
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE {$table} set bo_ativo_carrinho = false WHERE {$condition} = {$id} AND {$secondCondition} = {$secondId}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
