<?php

namespace library\crud;

class Delete extends Crud
{
    public function _delete($table, $column, $value)
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM {$table} WHERE {$column} = {$value}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
