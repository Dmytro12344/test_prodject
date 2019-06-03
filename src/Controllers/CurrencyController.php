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
        $currency = new CurrencyExchangeRequest($request->take(['amount','curr_name','submit', 'bank', 'revers']));
        $content = $validator->fullRequestCheck($currency);
        
        $course = new BankService();

        try{
            if(!$content) {
                $content = $course->exchange($currency->getBankName(),
                    $currency->getCurrName(),
                    $currency->getAmount(),
                    $currency->getRevers());
            }
        }
        catch(\Exception\CurrencyNotFoundException | IncorrectCurrencyNameException | CurrencyNotFoundException $e)
        {
            $content = $e->getMessage();
        }

        $twig->render([
            'title' => 'Currency exchange',
            'content' => $content,
            'amount' => $currency->getAmount()
        ],
            'demo.twig');
    }


}