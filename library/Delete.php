<?php

namespace library\crud;

class Delete extends Crud
{
    public function _delete($table, $column, $id)
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE {$table} set bo_ativo = false WHERE id = {$id}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function _deleteCat($table, $column, $value)
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM {$table} WHERE {$column} = {$value}";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute();
    }
}
