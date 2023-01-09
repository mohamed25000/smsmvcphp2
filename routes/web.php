<?php

use App\controllers\HomeController;
use App\controllers\StudentsController;
use smsmvcphp2\http\Router;

Router::get("home", action: [HomeController::class, "home"]);
Router::get("students", action: [StudentsController::class, "index"]);
