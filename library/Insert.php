<?php

namespace library\crud;

class Insert extends Crud
{
    public function _insert(string $table, array $arrValores): string
    {
        $columns = implode(', ', array_keys($arrValores));
        $values = implode(', ', array_fill(0, count($arrValores), '?'));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->db->prepare($sql);
            $stmt->execute(array_values($arrValores));

        return $this->db->lastInsertId();
    }
}
