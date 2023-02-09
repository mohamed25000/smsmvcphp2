<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class RequiredRule implements Rule
{
    public function apply($field, $value, $data)
    {
        return !empty($value);
    }

    public function __toString(): string
    {
        return "%s is required and can not be empty";
    }
}