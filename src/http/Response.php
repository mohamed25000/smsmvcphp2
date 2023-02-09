<?php

namespace smsmvcphp2\http;

class Response
{
    public function back()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);

        return $this;
    }
}