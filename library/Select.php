<?php

namespace library\crud;

use stdClass;

class Select extends Crud
{
    public function _select(string $table, string $condition = '', string $value = '', string $secondCondition = '', string $secondValue = '', string $column = '*', bool $unique = false): array|\stdClass|bool
    {
        $sql = [];

        if ($condition) {
            $sql[] = "{$condition} = '{$value}'";
        }
        if ($secondCondition) {
            $sql[] = "{$secondCondition} = '{$secondValue}'";
        }
        if ($table == 'produto' || $table == 'categoria' || $table == 'comentario' || $table == 'itens_pedido') {
            $sql[] = 'bo_ativo = true';
        }
        if ($table == 'carrinho') {
            $sql[] = 'bo_ativo_carrinho = true';
        }
        $where = "SELECT {$column} FROM {$table} WHERE ".implode(' AND ', $sql);

        $consulta = $this->db->query($where);

        if ($unique) {
            return $consulta->fetch(\PDO::FETCH_OBJ);
        }

        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function _selectJoin(string $firstTable, string $secondTable, string $condition, string $secondCondition, string $where = '', string $value = ''): array
    {
        $sql = "SELECT * FROM {$firstTable} as a JOIN {$secondTable} as b on a.{$condition} = b.{$secondCondition}";

        if ($where) {
            $sql .= " WHERE a.{$where} = {$value}";
        }
        if ($firstTable == 'carrinho' && $where) {
            $sql .= ' AND bo_ativo_carrinho = true';
        }

        $consulta = $this->db->query($sql);

        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function _selectCount(string $table): array
    {
        $sql = "SELECT count(*) FROM {$table}";

        if ($table == 'produto' || $table == 'categoria' || $table == 'carrinho') {
            $sql .= ' WHERE bo_ativo = true';
        }

        $consulta = $this->db->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }

    public function _selectSum(string $table, string $column, string $id = '', string $condition = ''): array
    {
        $sql = "SELECT sum({$column}) FROM {$table}";

        if ($id) {
            $sql .= " WHERE {$id} = {$condition}";
        }
        if ($table == 'carrinho') {
            $sql .= ' AND bo_ativo_carrinho = true';
        }

        $consulta = $this->db->query($sql);

        return $consulta->fetch(\PDO::FETCH_ASSOC);
    }
}
