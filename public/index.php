<?php

use Dotenv\Dotenv;
use smsmvcphp2\Application;

session_start();

require_once __DIR__ . "/../src/support/helpers.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../routes/web.php";

$env = Dotenv::createImmutable(dirname(__DIR__));
$env->load();

$app = new Application();
$app->run();


