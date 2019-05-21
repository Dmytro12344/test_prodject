<?php

require_once(__DIR__ . "/vendor/autoload.php");
use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use Core\Router;
use Lib\TwigWrap;




$rout = new Router();

echo $rout->run();




$course = new BankService();
$bank = new PrivatBank();
$current_course = $course->getCourse($bank);




$twig = new TwigWrap();

$twig->render(['current_course' => $current_course], 'demo.twig');

