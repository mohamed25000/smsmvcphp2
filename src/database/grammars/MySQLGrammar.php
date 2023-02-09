<?php

namespace smsmvcphp2\database\grammars;

use App\models\Model;
use App\models\User;

class MySQLGrammar
{
    public static function buildInsertQuery($keys, $table): string
    {
        $values = "";
        for ($i = 1; $i <= count($keys); $i++) {
            $values .= '?';
            if ($i < count($keys)) {
                $values .= ', ';
            }
        }

        $query = 'INSERT INTO ' . $table . ' (`' . implode('`, `', $keys) . '`) VALUES(' . rtrim($values, ', ') . ')';
        return $query;
    }

    public static function buildUpdateQuery($keys)
    {
        $query = "UPDATE " . User::getTableName() . " SET ";

        foreach ($keys as $key) {
            $query .= "{$key} = ?, ";
        }

        $query = rtrim($query, ', ') . ' WHERE id = ?';

        return $query;
    }

    public static function buildDeleteQuery()
    {
        return 'DELETE FROM ' . User::getTableName() . ' WHERE id = ?';
    }

    public static function buildSelectQuery($columns, $table, $filter)
    {
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }

        $query = "SELECT {$columns} FROM " . $table;

        if ($filter) {
            $query .= " WHERE {$filter[0]} {$filter[1]} ?";
        }

        return $query;
    }

}