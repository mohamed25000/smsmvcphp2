<?php

namespace App\controllers;

use App\models\Auth;
use App\models\User;
use smsmvcphp2\views\View;

class UsersController extends Controller
{

    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $user = new User();

        $data = $user->where('*', User::getTableName());

        View::make('users', ['rows' => $data]);

    }
}