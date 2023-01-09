<?php

namespace smsmvcphp2\http;

class Request
{
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path(): string
    {
        $path = $this->getURL()[0];

        return str_contains($path,'?') ? explode('?', $path)[0] : $path;
        //return $path;

    }

    private function getURL()
    {
        $url = $_GET['url'] ?? "home";
        return explode("/", filter_var(trim($url,"/")),FILTER_SANITIZE_URL);
    }

    public function getParams()
    {
        $url = $this->getURL();
        unset($url[0]);
        return array_values($url);
    }

}