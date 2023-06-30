<?php

namespace core\responses\exceptions;

use Throwable;

class AppError extends \DomainException
{
    public function __construct($mensagem = '')
    {
        parent::__construct($mensagem);
    }
}