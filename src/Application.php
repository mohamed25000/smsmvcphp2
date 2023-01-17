<?php

namespace smsmvcphp2;

use App\models\User;
use smsmvcphp2\database\Database;
use smsmvcphp2\database\managers\MySQLManager;
use smsmvcphp2\http\Request;
use smsmvcphp2\http\Response;
use smsmvcphp2\http\Router;
use smsmvcphp2\support\helpers;

class Application
{
    protected Router $router;
    protected Request $request;
    protected Response $response;
    public Database $db;

    /**
     * @param Request $request
     * @param Response $response
     */

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($this->getDatabaseDriver());
    }

    protected function getDatabaseDriver()
    {
        return match (env('DBDRIVER')) {
            'mysql' => new MySQLManager(),
            default => new MySQLManager(),
        };
    }

    public function run()
    {
        $this->db->init();
        $this->router->resolve();
    }


}