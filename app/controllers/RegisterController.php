<?php

namespace App\controllers;

use App\models\User;
use smsmvcphp2\views\View;

class RegisterController
{
    public function register()
    {
        View::make("register");
    }

    public function store()
    {
        User::insert([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'user_id' => $_POST['email'],
            'gender' => $_POST['gender'],
            'rank' => $_POST['rank']
        ]);
    }
}