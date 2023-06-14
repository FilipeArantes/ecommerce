<?php

namespace library\crud;

class Select extends Crud
{
    public function _select($table, $condition = '', $value = '', $secondCondition = '', $secondValue = '', $column = '*')
    {
        $sql = "SELECT {$column} FROM {$table}";

        if ($condition) {
            $sql .= " WHERE {$condition} = '{$value}'";
        }
        if ($secondCondition) {
            $sql .= " and {$secondCondition} = '{$secondValue}'";
        }

        $consulta = $this->db->query($sql);

        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }
}
