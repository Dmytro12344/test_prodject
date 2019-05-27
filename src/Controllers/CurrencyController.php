<?php

namespace Controllers;

use Request\Request;
use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use Lib\TwigWrap;

class CurrencyController
{

    public function exchange() : void
    {
        $request = new Request();
        $twig = new TwigWrap();

        if($request->isSubmitted() && $request->isValid())
        {
            $bank = new PrivatBank();
            $course = new BankService();
            $postDate = $request->getPostData();

            $current_course = $course->getCourse($bank, $postDate['curr_name']);
            $amount = $current_course * $postDate['amount'];

            $twig->render(['needed_course' => $amount], 'exchange.twig');
        }

        $twig->render([], 'demo.twig');

    }

}