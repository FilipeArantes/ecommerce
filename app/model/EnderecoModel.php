<?php

namespace app\model;

use library\crud\Crud;

class EnderecoModel extends Crud
{
    public function save($params)
    {
        return $this->_insert('endereco', $params);
    }   
}