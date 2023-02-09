<?php

namespace smsmvcphp2\database\managers;

use App\models\Model;
use smsmvcphp2\database\grammars\MySQLGrammar;
use smsmvcphp2\database\managers\contracts\DatabaseManager;

class MySQLManager implements DatabaseManager
{
    public static $connection;

    public function connetct(): \PDO
    {
        if(!self::$connection) {
            $string = $_ENV['DBDRIVER'] . ":host=".$_ENV['DBHOST'].";dbname=".$_ENV['DBNAME'].";port=".$_ENV['PORT'];
            self::$connection = new \PDO($string, $_ENV['DBUSER'],$_ENV['DBPASS']);
        }

        return self::$connection;
    }

    public function query($query, $value = [])
    {
        $stmt = self::$connection->prepare($query);

        for($i = 1; $i<= count($value); $i++) {
            $stmt->bindValue($i, $value[$i - 1]);
        }
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($data, $table)
    {
        $query = MySQLGrammar::buildInsertQuery(array_keys($data), $table);

        $stmt = self::$connection->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }

        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $query = MySQLGrammar::buildUpdateQuery(array_keys($data));

        $stmt = self::$connection->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
            if ($i == count($values)) {
                $stmt->bindValue($i + 1, $id);
            }
        }

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = MySQLGrammar::buildDeleteQuery();
        $stmt = self::$connection->prepare($query);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function read($columns, $table, $filter)
    {
        $query = MySQLGrammar::buildSelectQuery($columns, $table, $filter);

        $stmt = self::$connection->prepare($query);

        if ($filter) {
            $stmt->bindValue(1, $filter[2]);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}