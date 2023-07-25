<?php

namespace app\model;

use library\crud\Crud;

class ItensPedidoModel extends Crud
{
    public function save(array $params): array
    {
        $idsItens = [];

        foreach ($params as $key => $value) {
            $inserirIds = $this->_insert('itens_pedido', $value);
            $idsItens[] = $inserirIds;
        }

        return $idsItens;
    }
}
