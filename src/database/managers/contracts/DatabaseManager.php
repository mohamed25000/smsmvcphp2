<?php

namespace smsmvcphp2\database\managers\contracts;

interface DatabaseManager
{
    public function connetct(): \PDO;
}