<?php

require_once(__DIR__ . "/vendor/autoload.php");

use Core\Route\Router;
use Core\Route\DispatcherRoute;
use Helper\Common;








$route = new Router('example.com');
$route->add('home', '/', 'CurrencyController:exchange');
$routerDispatch = $route->dispatch('GET', Common::getPathUrl());









if($routerDispatch === null)
{
    $routerDispatch = new DispatcherRoute('ErrorController:page404');
}

list($class, $action) = explode(':', $routerDispatch->getController(), 2);


$controller = '\\Controllers\\' . $class;
call_user_func_array([new $controller, $action], $routerDispatch->getParameters());





