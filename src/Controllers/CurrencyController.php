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

        if($validationReq->isSubmitted())
        {
            try {
                $currency = new CurrencyModel($validationNum->aboveZero($_POST['amount']), $_POST['curr_name']);


                $course = new BankService();

                $exchange_raith = $course->exchange($_POST['bank'], $currency->getCurrName(), $currency->getAmount());
                $twig->render(['needed_course' => $exchange_raith], 'demo.twig');

            }
            catch(\Exception\IncorrectCurrencyNameException $e)
            {
                $twig->render(['error' => $e->getMessage()], 'demo.twig');
            }
            catch(\Exception\InvalidAmountException $e)
            {
                $twig->render(['error' => $e->getMessage()], 'demo.twig');
            }
        } else {

            $twig->render([], 'demo.twig');
        }
    }


}