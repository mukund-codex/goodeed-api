<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    private array $data = array ();

    protected $code;

    public function __construct($data, $message, $code)
    {
        parent::__construct($message);
        $this->data = $data;
        $this->code = $code;
    }
    public function getData(): array
    {
        return $this->data;
    }
}
