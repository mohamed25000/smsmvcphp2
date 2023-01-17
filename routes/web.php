<?php

use App\controllers\HomeController;
use App\controllers\LoginController;
use App\controllers\ProfileController;
use App\controllers\RegisterController;
use App\controllers\StudentsController;
use smsmvcphp2\http\Router;

Router::get("home", action: [HomeController::class, "home"]);
Router::get("students", action: [StudentsController::class, "index"]);
Router::get("login", action: [loginController::class, "login"]);
Router::get("register", action: [RegisterController::class, "register"]);
Router::get("profile", action: [ProfileController::class, "profile"]);
Router::post("register", action: [RegisterController::class, "store"]);
