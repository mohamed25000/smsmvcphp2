<?php

namespace smsmvcphp2\views;

class View
{
    public static function make($view, $params = [])
    {
        /*$baseContent = self::getBaseContent();
        $viewContent = self::getViewContent($view, $params);
        echo str_replace('{{content}}', $viewContent, $baseContent);*/
        extract($params);
        if (file_exists(__DIR__ . "/../../views/" . $view . ".php")) {
            require (__DIR__ . "/../../views/" . $view . ".php") ;
        } else {
            require (__DIR__ . "/../../views/errors/404.php");
        }
    }

    protected static function getBaseContent()
    {
        ob_start();
        require_once __DIR__ . "/../../views/layout/main.php";
        return ob_get_clean();
    }

    protected static function getViewContent($view, $isError = false, $params = [])
    {
        foreach($params as $param => $value) {
            $$param = $value;
        }
        //extract($params);
        if ($isError) {
            include __DIR__ . "/../../views/errors/404.php";
        } else {
            ob_start();
            include __DIR__ . "/../../views/" . $view . ".php";
            return ob_get_clean();
        }
    }

    public static function makeError($error)
    {
        //View::getViewContent($error, true);
        require (__DIR__ . "/../../views/errors/" . $error . ".php");
    }

}