<?php


namespace Controllers;


use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use Lib\TwigWrap;

class HomeController
{
    public function index() : void
    {



        $twig = new TwigWrap();
        $twig->render([], 'demo.twig');
    }
}