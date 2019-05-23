<?php

namespace Controllers;

use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use CurrencyExchange\SomeBank;
use Lib\TwigWrap;

class CurrencyController
{
    private $course;

    public function __construct()
    {
        $this->exchange();
        $this->render_output();
    }

    public function exchange() : void
    {
        if(isset($_POST['submit'])){
            if(empty($_POST['amount'])){
                $amount = 0;
            } else {
                $amount = $_POST['amount'];
            }
            $course = new BankService();
            $bank = new PrivatBank();
            $current_course = $course->getCourse($bank, $_POST['curr_name']);
            $this->course = $current_course * $amount;
        }
    }

    public function render_output() : void
    {
        $twig = new TwigWrap();
        $twig->render(['needed_course' => $this->course], 'exchange.twig');
    }
}