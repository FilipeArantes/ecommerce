<?php

namespace library\crud;

class Update extends Crud
{
    public function _update(string $table, array $data, string $condition, int $id, array $params = []): string
    {
        $set = implode(', ', array_map(function ($column) {
            return "{$column}=?";
        }, array_keys($data)));

        $sql = "UPDATE {$table} SET {$set} WHERE {$condition} = {$id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_merge(array_values($data), $params));

        return $stmt->rowCount();
    }
}