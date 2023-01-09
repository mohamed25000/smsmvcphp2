<?php

namespace App\controllers;

use smsmvcphp2\views\View;

class HomeController
{
    public function home()
    {
        View::make("home");
    }
}