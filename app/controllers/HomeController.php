<?php

namespace App\controllers;

use App\models\Auth;
use App\models\User;
use smsmvcphp2\views\View;

class HomeController extends Controller
{
    public function home()
    {
        if(!Auth::logged_in()) {
            $this->redirect('login');
        }

        $user = new User();

        $data = $user->findAll();

        View::make('home', ['rows'=>$data]);
    }
}