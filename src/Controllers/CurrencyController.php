<?php

namespace Controllers;

use Model\CurrencyModel;
use Request\Request;
use Validate\RequestValidate;
use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;
use Lib\TwigWrap;

class CurrencyController
{

    public function exchange() : void
    {
        $request = new Request();
        $twig = new TwigWrap();
        $validation = new RequestValidate();

        if($validation->isSubmitted() && $validation->isValid())
        {
            $currency = new CurrencyModel();
            $bank = new PrivatBank();
            $course = new BankService();
            $currency->fill($request->getRequest());

            $exchange_raith = $course->getCourseRaith($bank, $currency->getFields());
            $twig->render(['needed_course' => $exchange_raith], 'exchange.twig');
        }

        $twig->render([], 'demo.twig');

    }

}