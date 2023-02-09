<?php

namespace App\controllers;

use App\models\User;
use smsmvcphp2\validation\Validator;
use smsmvcphp2\views\View;

class RegisterController extends Controller
{
    public function register()
    {
        View::make("register");
    }

    public function store()
    {
        /*User::insert([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'user_id' => $_POST['email'],
                'gender' => $_POST['gender'],
                'rank' => $_POST['rank']
         ]);*/
        $data = $_POST;

        $validator = new Validator();
        $validator->setRules([
            'firstname' => 'required|alnum|between:3,32',
            'lastname' => 'required|alnum|between:3,32',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alnum|between:8,32',
            'rank' => 'rank',
            'password_confirmation' => 'required|alnum|between:8,32|match',
            'gender' => 'gender'
        ]);

        $validator->setAliases([
            'password_confirmation' => 'Password confirmation'
        ]);

        $validator->make($_POST);

        if(!$validator->passes()) {
            $errors = $validator->errors();
            View::make("register", ['errors' => $errors]);

            return back();
        }
        $user = new User();
        $user->insert($_POST);
        return back();
    }
}