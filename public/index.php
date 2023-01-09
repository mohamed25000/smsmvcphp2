<?php

use smsmvcphp2\Application;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../routes/web.php";

$app = new Application();
$app->run();

/*echo "<pre>";
var_dump($_SERVER);
echo "</pre>";*/

