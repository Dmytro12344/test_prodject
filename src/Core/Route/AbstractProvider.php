<?php


namespace Core\Route;


abstract class AbstractProvider
{
    public $service_name;

    abstract function init();
}