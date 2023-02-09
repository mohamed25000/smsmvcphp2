<?php

namespace App\controllers;

use App\models\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        // code...
        Auth::logout();
        $this->redirect('login');
    }
}