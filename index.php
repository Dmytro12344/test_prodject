<?php

require_once(__DIR__ . "/vendor/autoload.php");

use Core\Route\Router;
use Core\Route\DispatcherRoute;
use Helper\Common;
use Lib\TwigWrap;




$route = new Router('example.com');

$route->add('home', '/', 'HomeController:index');
$route->add('product','/user/12', 'ProductController:show');


$routerDispatch = $route->dispatch(Common::getMethod(), Common::getPathUrl());


if($routerDispatch === null)
{
    $routerDispatch = new DispatcherRoute('ErrorController:page404');
}
list($class, $action) = explode(':', $routerDispatch->getController(), 2);




$controller = '\\Controllers\\' . $class;
call_user_func_array([new $controller, $action], $routerDispatch->getParameters());



/*$twig = new TwigWrap();
$twig->render([], 'demo.twig'); */

