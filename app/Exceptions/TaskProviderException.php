<?php

namespace App\Exceptions;

use Exception;

class TaskProviderException extends Exception
{
    public function report()
    {
    }

    public function render($request)
    {
        return false;
    }
}
