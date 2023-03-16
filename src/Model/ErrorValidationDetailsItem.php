<?php

namespace App\Model;

class ErrorValidationDetailsItem
{
    public function __construct(private string $field, private string $message)
    {
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
