<?php

namespace smsmvcphp2\validation;

class ErrorBag
{
    protected array $errors = [];

    public function add($field, $message): void
    {
        $this->errors[$field][] = $message;
    }

    public function __get(string $key)
    {
        if(property_exists($this, $key)) {
            return $this->$key;
        }
    }
}