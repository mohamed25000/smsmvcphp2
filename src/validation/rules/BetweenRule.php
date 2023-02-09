<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class BetweenRule implements Rule
{
    protected int $min;
    protected int $max;

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }


    public function apply($field, $value, $data)
    {
        return !(strlen($value) > $this->max || strlen($value) < $this->min);
    }

    public function __toString(): string
    {
        return "%s must be between {$this->min} and {$this->max}";
    }
}