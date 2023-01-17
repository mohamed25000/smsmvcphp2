<?php

namespace smsmvcphp2\database\grammars;

use App\models\Model;
use App\models\User;

class MySQLGrammar
{
    public static function buildInsertQuery($keys): string
    {
        $values = "";
        for ($i = 1; $i <= count($keys); $i++) {
            $values .= '?';
            if ($i < count($keys)) {
                $values .= ', ';
            }
        }

        $query = 'INSERT INTO ' . User::getTableName() . ' (`' . implode('`, `', $keys) . '`) VALUES(' . rtrim($values, ', ') . ')';
        return $query;
    }
}