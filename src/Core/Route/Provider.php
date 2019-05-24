<?php


namespace Core\Route;

use Core\Route\AbstractProvider;
use Core\Route\Router;


class Provider extends AbstractProvider
{
    public $service_name = 'router';

    public function init()
    {
        //$router = new Router('http://example.com/');
    }
}