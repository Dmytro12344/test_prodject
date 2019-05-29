<?php

namespace Controllers;

use Model\CurrencyModel;
use Validate\NumericValidator;
use Validate\RequestValidate;
use CurrencyExchange\BankService;

use Lib\TwigWrap;

class CurrencyController
{

    public function exchange() : void
    {
        $twig = new TwigWrap();
        $validationReq = new RequestValidate();
        $validationNum = new NumericValidator();

        if($validationReq->isSubmitted() && $validationReq->isValid())
        {

            $currency = new CurrencyModel($validationNum->aboveZero($_POST['amount']), 'TDK');

            $course = new BankService();
            try
            {
                $exchange_raith = $course->exchange('PrivatBank', $currency->getCurrName(), $currency->getAmount());
                $twig->render(['needed_course' => $exchange_raith], 'exchange.twig');
            } catch(\Exception $e)
            {

            }
        }

        $twig->render([], 'demo.twig');

    }

}