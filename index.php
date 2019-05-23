<?php

require_once(__DIR__ . "/vendor/autoload.php");

use Core\Router;
use Lib\TwigWrap;




$rout = new Router();
$rout->run();






$twig = new TwigWrap();
$twig->render([], 'demo.twig');

