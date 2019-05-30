<?php

namespace Controllers;


use Exception\IncorrectCurrencyNameException;
use Model\CurrencyExchangeRequest;
use Exception\CurrencyNotFoundException;
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
        $currency = new CurrencyExchangeRequest($request->take(['amount','curr_name','submit', 'bank']));


        $error = $validator->fullRequestCheck($currency);


        $course = new BankService();
        $amount = $currency->getAmount();
        try{
           $content = $course->exchange($currency->getBankName(), $currency->getCurrName(), $currency->getAmount());
        }
        catch(\Exception\CurrencyNotFoundException | IncorrectCurrencyNameException | CurrencyNotFoundException $e)
        {
           $error = $e->getMessage();
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