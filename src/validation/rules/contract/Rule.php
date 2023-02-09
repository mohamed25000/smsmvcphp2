<?php

namespace smsmvcphp2\validation\rules\contract;

interface Rule
{
    public function apply($field, $value, $data);

    public function __toString(): string;
}