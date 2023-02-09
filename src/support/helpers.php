<?php

use smsmvcphp2\Application;
use smsmvcphp2\http\Response;

if(!function_exists('env')) {
    function env ($key, $default = null) {
        return $_ENV[$key] ?? value($default);
    }
}

if(!function_exists('value')) {
    function value($value) {
        return ($value instanceof Closure) ? $value() : $value;
    }
}

if(!function_exists('app')) {
    function app(){
        static $instance = null;
        if(!$instance) {
            $instance = new Application();
        }
        return $instance;
    }
}

function get_var($key,$default = "")
{

    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }

    return $default;
}

function get_select($key,$value)
{
    if(isset($_POST[$key]))
    {
        if($_POST[$key] == $value)
        {
            return "selected";
        }
    }

    return "";
}

function esc($var)
{
    return htmlspecialchars($var);
}

if (!function_exists('back')) {
    function back()
    {
        return (new Response())->back();
    }
}


if(!function_exists('random_string')) {
    function random_string(int $length)
    {
        $arr = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $text = '';

        for ($x = 0; $x <= $length; $x++) {
            $random = rand(0, 61);
            $text .= $arr[$random];
        }
        return $text;

    }
}

if(!function_exists('get_date')) {
    function get_date($date)
    {
        return date("jS M, Y",strtotime($date));
    }
}