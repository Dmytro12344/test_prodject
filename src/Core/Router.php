<?php


namespace Core;

class Router
{
    protected $routes = [];
    protected $params =[];


    function __construct()
    {
        $arr = require_once("config.php");
        foreach($arr as $key => $value){
            $this->add($key, $value);
        }
    }

    public function add($route, $params){
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match(){
       $url = trim($_SERVER['REQUEST_URI'],'/index.php');
       foreach($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
       }
       return false;
    }

    public function run(){
        var_dump($this->routes);
        if($this->match()){
            $path = 'src\Controllers\\'.ucfirst($this->routes['controller']).'Controller';
            /*if(class_exists($path)){
                $action = $this->params['action'].'Action';
                if(method_exists($path. $action)){
                    $controller = new $path;
                } else {
                    echo 'Action not found: ' . $action;
                }
            } else {
                echo 'Controller not found' . $path;
            }
        } else { */
            echo 'Path not found' . $path;
        }
    }
}