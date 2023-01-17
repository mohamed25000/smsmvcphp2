<?php

namespace App\controllers;

use smsmvcphp2\views\View;

class ProfileController
{
    public function profile()
    {
        View::make("profile");
    }
}