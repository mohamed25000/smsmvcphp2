<?php

namespace App\models;
use smsmvcphp2\database\Database;

class Model extends Database
{
    protected static $table;
    public $errors = array();
    public function __construct()
    {
        // code...
    }

    public function insert($data, $table)
    {
        self::$table = static::class;

        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

        if(property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }
        }

        return app()->db->create($data, $table);
    }

    public static function updateUser($id, $data)
    {
        return app()->db->update($id, $data);
    }

    public static function deleteUser($id)
    {
        return app()->db->delete($id);

    }

    public function where($columns, $table, $filter = null)
    {
        /* $column = addslashes($column);
        $query = "select * from $this->table where :column = :value";
        return $this->query($query, [
            'column' => $column,
            'value' => $value
        ]);*/

        $data = app()->db->read($columns, $table, $filter);

        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }
        return $data;
    }

    public function all($table)
    {
        $data = app()->db->read('*', $table);

        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }

        return $data;
    }

    public static function getModel()
    {
        self::$table = static::class;
        self::$table = explode("\\", self::$table);
        return ucfirst(end(self::$table));
    }

    public static function getTableName()
    {
        self::$table = get_called_class();
        self::$table = explode("\\", self::$table);
        return strtolower(end(self::$table)) . "s";
    }

}