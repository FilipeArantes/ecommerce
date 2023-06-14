<?php

namespace library\crud;

class Update extends Crud
{
    public function _update($table, $data, $condition, $params = [])
    {
        $set = implode(', ', array_map(function ($column) {
            return "{$column}=?";
        }, array_keys($data)));

        $sql = "UPDATE {$table} SET {$set} WHERE {$condition}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_merge(array_values($data), $params));

        return $stmt->rowCount();
    }
}