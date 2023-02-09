<?php

namespace App\controllers;

use App\models\Auth;
use App\models\User;
use smsmvcphp2\views\View;

class LoginController extends Controller
{
    public function index()
    {
        View::make("login");
    }

    public function login()
    {
        $errors = array();
        $user = new User();
        if($row = $user->where('*', 'users', ['email', '=', $_POST['email']])) {
            $row = $row[0];

            if (!password_verify($_POST['password'], $row['password'])) {
                Auth::authenticate($row);
                $this->redirect('home');
            }
        }
        $errors['email'] = "email or password incorrect";

        View::make('login', [
            'errors' => $errors,
        ]);
    }

}