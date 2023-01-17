<?php

use Dotenv\Dotenv;
use smsmvcphp2\Application;

require_once __DIR__ . "/../src/support/Helpers.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../routes/web.php";

$env = Dotenv::createImmutable(dirname(__DIR__));
$env->load();

$app = new Application();
$app->run();
