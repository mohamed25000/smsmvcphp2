<?php

namespace smsmvcphp2\validation\rules;

use smsmvcphp2\validation\rules\contract\Rule;

class UniqueRule implements Rule
{
    protected $table;
    protected $column;

    /**
     * @param $table
     * @param $column
     */
    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    public function apply($field, $value, $data)
    {
        return !(app()->db->raw("SELECT * FROM {$this->table} WHERE {$this->column} = ?", [$value]));
    }

    public function __toString(): string
    {
        return "this %s is already taken";
    }
}