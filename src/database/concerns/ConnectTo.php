<?php

namespace smsmvcphp2\database\concerns;

use smsmvcphp2\database\Database;
use smsmvcphp2\database\managers\contracts\DatabaseManager;

trait ConnectTo
{
    public static function connect(DatabaseManager $manager)
    {
        return $manager->connetct();
    }
}