<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class MatchRule implements Rule
{

    public function apply($field, $value, $data)
    {
        return $data[$field] === $data["password"];
    }

    public function __toString(): string
    {
        return "%s must be identical as password";
    }
}