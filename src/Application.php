<?php

namespace smsmvcphp2;

use smsmvcphp2\http\Request;
use smsmvcphp2\http\Response;
use smsmvcphp2\http\Router;

class Application
{
    protected Router $router;
    protected Request $request;
    protected Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }


}