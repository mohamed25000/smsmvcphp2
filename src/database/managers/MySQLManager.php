<?php

namespace smsmvcphp2\database\managers;

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

    public function create($data)
    {
        $query = MySQLGrammar::buildInsertQuery(array_keys($data));

        $stmt = self::$connection->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }
        return $stmt->execute();
    }

}