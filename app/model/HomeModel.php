<?php

namespace app\model;

use library\crud\Crud;
use library\crud\Select;
use PDO;

class HomeModel extends Crud
{
    public function getAll()
    {
        return $this->_select('produto');
    }
}
