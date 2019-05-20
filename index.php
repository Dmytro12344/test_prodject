<?php



require_once(__DIR__ . "/vendor/autoload.php");
//use GuzzleHttp\Client;
//use src\CurrencyExchange\PrivatBank;

require_once("src/CurrencyExchange/PrivatBank.php");


$course = new PrivatBank();

echo $course->getCourse();


/**$loader = new \Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new \Twig_Environment($loader);






echo $twig->render('demo.twig', ['name' => 'zhinyz', 'responses' => $response]); **/
