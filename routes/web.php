<?php

use App\controllers\AddSchoolController;
use App\controllers\HomeController;
use App\controllers\LoginController;
use App\controllers\LogoutController;
use App\controllers\ProfileController;
use App\controllers\RegisterController;
use App\controllers\SchoolsController;
use App\controllers\StudentsController;
use App\controllers\UsersController;
use smsmvcphp2\http\Router;

Router::get("home", action: [HomeController::class, "home"]);

Router::get("students", action: [StudentsController::class, "index"]);

Router::get("login", action: [loginController::class, "index"]);
Router::post("login", action: [loginController::class, "login"]);

Router::get("logout", action: [logoutController::class, "logout"]);

Router::get("register", action: [RegisterController::class, "register"]);
Router::post("register", action: [RegisterController::class, "store"]);

Router::get("profile", action: [ProfileController::class, "profile"]);

Router::get("users", action: [UsersController::class, "index"]);

Router::get("schools", action: [SchoolsController::class, "index"]);

Router::get("schools/add", action: [SchoolsController::class, "add"]);
Router::post("schools/add", action: [SchoolsController::class, "store"]);

Router::get("schools/edit", action: [SchoolsController::class, "edit"]);

Router::get("schools/delete", action: [SchoolsController::class, "delete"]);


