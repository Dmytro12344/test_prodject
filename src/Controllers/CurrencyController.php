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

            $currency = new CurrencyModel($validationNum->aboveZero($_POST['amount']), $_POST['curr_name']);

            $course = new BankService();
            try
            {
                $exchange_raith = $course->exchange('PrivatBank', $currency->getCurrName(), $currency->getAmount());
                $twig->render(['needed_course' => $exchange_raith], 'exchange.twig');
            } catch(\Exception\IncorrectCurrencyNameException $e)
            {
                $twig->render(['error' => $e->getMessage()], 'exchange.twig');
            }
        }

        $twig->render([], 'demo.twig');

    }

}