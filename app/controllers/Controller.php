<?php

namespace App\controllers;

class Controller
{
    public function redirect($link)
    {
        header("Location: http://localhost/smsmvcphp2/public/".trim($link,"/"));
        die;
    }
}