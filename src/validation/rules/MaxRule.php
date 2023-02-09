<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class MaxRule implements Rule
{
    protected int $max;

    /**
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->max = $max;
    }


    public function apply($field, $value, $data)
    {
        return (strlen($value) < $this->max);
    }

    public function __toString(): string
    {
        return "%s must be less than {$this->max} characters";
    }
}