<?php

namespace App\Model;

class ErrorDebugDetails
{
    public function __construct(private string $trace)
    {
    }

    /**
     * @return string
     */
    public function getTrace(): string
    {
        return $this->trace;
    }

}
