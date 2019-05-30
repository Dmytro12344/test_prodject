<?php

namespace Controllers;

use Model\CurrencyExchangeRequest;
use Validate\RequestValidate;
use CurrencyExchange\BankService;
use Request\Request;
use Lib\TwigWrap;


class CurrencyController
{

    public function exchange() : void
    {
        $twig = new TwigWrap();
        $request = new Request();
        $validator = new RequestValidate();

        $currency = new CurrencyExchangeRequest($request->take(['amount','curr_name','submit']));
        if($validator->fullRequestCheck($currency) !== '') {


            $error = '';


            $course = new BankService();
            $amount = $currency->getAmount();
            $content = $course->exchange($_POST['bank'], $currency->getCurrName(), $currency->getAmount());
        }

        $twig->render([
            'title' => 'Currency exchange',
            'error' => $error,
            'content' => $content,
            'amount' => $amount
        ],
            'demo.twig');
    }


}