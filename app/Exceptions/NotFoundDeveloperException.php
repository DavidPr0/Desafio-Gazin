<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Exception;

class NotFoundDeveloperException extends Exception
{
    protected $message = 'Developer não encontrado';

    protected $code = Response::HTTP_NOT_FOUND;

    public function __construct()
    {
        parent::__construct($this->message);
    }
}