<?php

namespace App\controllers;

use smsmvcphp2\views\View;

class LoginController
{
    public function login()
    {
        View::make("login");
    }
}