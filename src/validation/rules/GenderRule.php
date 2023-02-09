<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class GenderRule implements Rule
{

    public function apply($field, $value, $data)
    {
        $gender = ['male', 'female'];
        return in_array($value, $gender);
    }

    public function __toString(): string
    {
        return "%s is not valid, please select one";
    }
}