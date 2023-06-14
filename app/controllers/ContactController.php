<?php

namespace app\controllers;

use app\model\ContactModel;
use InvalidArgumentException;
use library\crud\Crud;

class ContactController extends Controller 
{
    public function __construct(
        private $model = new ContactModel()
    ) {
    }

    public function index()
    {
    }

    public function store($params)
    {
        try {
            $select = new Crud();
        if ($select->_select('usuario','*', 'email', $params["email"])) {
            http_response_code(406);
            throw new InvalidArgumentException("Email inválido ou já está em uso");
        }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $this->model->save($params);
    }
}
