<?php

namespace App\controllers;

use App\models\User;
use smsmvcphp2\views\View;

class ProfileController extends Controller
{
    public function profile()
    {
        View::make("profile");
    }

    public function updateUser($id, $data)
    {
        User::update($id, $data);
    }

}