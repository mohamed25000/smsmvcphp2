<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class AlRule implements Rule
{

    public function apply($field, $value, $data)
    {
        return preg_match('/^[a-zA-Z]+$/', $value);
    }

    public function __toString(): string
    {
        return "Only letters allowed for %s name";
    }
}