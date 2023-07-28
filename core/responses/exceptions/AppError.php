<?php

namespace core\responses\exceptions;

class AppError extends \DomainException
{
    public function __construct($mensagem = '')
    {
        parent::__construct($mensagem);
    }
}
