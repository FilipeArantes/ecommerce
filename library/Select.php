<?php

namespace library\crud;

class Select extends Crud
{
    public function _select($table, $condition = '', $value = '', $secondCondition = '', $secondValue = '', $column = '*')
    {
        $sql = [];

        if ($condition) {
            $sql[] = "{$condition} = '{$value}'";
        }
        if ($secondCondition) {
            $sql[] = "{$secondCondition} = '{$secondValue}'";
        }
        if ($table == "produto" || $table == "categoria") {
            $sql[] = "bo_ativo = true";
        }
        $where = "SELECT {$column} FROM {$table} WHERE " . implode(" AND ", $sql);

        $consulta = $this->db->query($where);

        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function _selectJoin($firstTable, $secondTable, $condition, $secondCondition, $where = '', $value = '')
    {
        $sql = "SELECT * FROM {$firstTable} as a JOIN {$secondTable} as b on a.{$condition} = b.{$secondCondition}";

        if ($where) {
            $sql .= " WHERE a.{$where} = {$value}";
        }

        $consulta = $this->db->query($sql);

        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function _selectCount($table)
    {
        $sql = "SELECT count(*) FROM {$table}";

        $consulta = $this->db->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function _selectSum($table, $column)
    {
        $sql = "SELECT sum({$column}) FROM {$table}";

        $consulta = $this->db->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }
}
