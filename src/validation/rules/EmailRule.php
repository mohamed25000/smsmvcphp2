<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class EmailRule implements Rule
{

    public function apply($field, $value, $data)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function __toString(): string
    {
        return "%s must be a valid email address";
    }
}