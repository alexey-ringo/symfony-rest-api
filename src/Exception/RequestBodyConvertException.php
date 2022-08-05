<?php

namespace App\Exception;

use RuntimeException;
use Throwable;

class RequestBodyConvertException extends RuntimeException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct('Error while unwrapping request body', 0, $previous);
    }
}
