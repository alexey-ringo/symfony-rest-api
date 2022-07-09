<?php

namespace App\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class BookCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Book Category not found!', Response::HTTP_NOT_FOUND);
    }
}
