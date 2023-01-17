<?php

namespace App\models;

use smsmvcphp2\support\helpers;
use smsmvcphp2\database\Database;

class Model extends Database
{
    protected static $table;

    public function __construct()
    {
        // code...
    }

    public static function insert($attributes)
    {
        self::$table = static::class;
        return app()->db->create($attributes);
    }

    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where :column = :value";
        return $this->query($query, [
            'column' => $column,
            'value' => $value
        ]);
    }

    public static function getTableName()
    {
        self::$table = static::class;
        self::$table = explode("\\", self::$table);
        return strtolower(end(self::$table)) . "s";
    }

}