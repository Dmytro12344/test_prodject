<?php


namespace Core\Route;

use Core\Route\DispatcherRoute;

class UrlDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]'
    ];

    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }



    public function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [''];
    }



    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routes)){
            return new DispatcherRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }


    protected function doDispatch($method, $uri)
    {
        foreach($this->routes($method) as $route => $controller)
        {
            $pattern = '#^'. $route . '$#';

            if(preg_match($pattern, $uri, $parameters))
            {
                return new DispatcherRoute($controller, $parameters);
            }

        }
    }


    public function register($method, $pattern, $controller)
    {
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

}