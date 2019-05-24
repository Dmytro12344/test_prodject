<?php

namespace Controllers;

use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use CurrencyExchange\SomeBank;
use http\Exception\InvalidArgumentException;
use Lib\TwigWrap;

class CurrencyController
{

    public function __construct()
    {
        $this->exchange();
    }

    public function exchange() : void
    {
        try {
            $course = new BankService();
            $bank = new PrivatBank();
            $current_course = $course->getCourse($bank, $_POST['curr_name']);
            $amount = $current_course * $_POST['amount'];
            $twig = new TwigWrap();
            $twig->render(['needed_course' => $amount], 'exchange.twig');
            throw new  \Exception('td');
        }
        catch (\Exception $e){
            echo $e->getMessage();
            die();
        }

    }

}