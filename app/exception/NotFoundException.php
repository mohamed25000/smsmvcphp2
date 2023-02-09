<?php

namespace App\exception;

class NotFoundException extends \Exception
{
    protected $message = "Route not found";
}