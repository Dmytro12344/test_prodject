<?php


namespace Core\Route;


class DispatcherRoute
{
    private $controller;
    private $parameters;

    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getParameters() : array
    {
        return $this->parameters;
    }
}