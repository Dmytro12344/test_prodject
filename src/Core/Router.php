<?php


namespace Core;


class Router
{
    protected $routes = [];
    protected $params =[];


    public function __construct()
    {
        $arr = require 'config.php';
        foreach($arr as $key => $value){
            $this->add($key, $value);
        }
    }

    public function add($route, $params) : void
    {
        $this->routes[$route] = $params;
    }

    public function match() : array
    {
       $url = explode('/', $_SERVER['REQUEST_URI']);
       $params = [];
           if(isset($url[2])) {
               $params['controller'] = $url[2];
           }
           if(isset($url[3])) {
               $params['action'] = $url[3];
           }
           if(empty($params)){
               $params = ['controller' => '', 'action' => ''];
           }
        return $params;
    }

    
    public function run() : void
    {
        try{
            if(empty($this->is_valid())) {
                throw new \Exception();
            }

            $uri = $this->is_valid();
            $path = 'Controllers\\' . ucfirst($uri['controller']) . 'Controller';

            if(!class_exists($path)){
                throw  new \Exception();
            }

            if(!method_exists($path, $uri['action'])){
                throw new \Exception();
            }
            $controller = new $path;
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }



    public function is_valid() : array
    {
        $uri = $this->match();
        $valid_success = [];
        if(!empty($uri)) {
            foreach ($this->routes as $rout) {
                if ($rout['controller'] === $uri['controller']) {
                    $valid_success['controller'] = $uri['controller'];
                } else {
                    $valid_success['controller'] = '';
                }
                if( $rout['action'] === $uri['action'] ){
                    $valid_success['action'] = $uri['action'];
                } else {
                    $valid_success['action'] = '';
                }
            }
        }
        return $valid_success;
    }
}