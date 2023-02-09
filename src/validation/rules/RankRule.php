<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class RankRule implements Rule
{

    public function apply($field, $value, $data)
    {
        $rank = ['student', 'reception', 'lecturer', 'admin', 'super_admin'];
        return in_array($value, $rank);
    }

    public function __toString(): string
    {
        return "%s is not valid, please select one";
    }
}