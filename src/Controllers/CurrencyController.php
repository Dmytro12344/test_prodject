<?php

namespace Controllers;

use Model\CurrencyModel;
use Validate\NumericValidator;
use Validate\RequestValidate;
use Validate\DefinedValidate;
use CurrencyExchange\BankService;
use Exception\CurrencyNotFoundException;
use Exception\InvalidAmountException;
use Exception\IncorrectCurrencyNameException;
use Lib\TwigWrap;


class CurrencyController
{

    public function exchange() : void
    {
        $twig = new TwigWrap();
        $validationReq = new RequestValidate();
        $validationNum = new NumericValidator();
        $defValidation = new DefinedValidate();
        $error = '';
        $amount = 1;
        $content='';

        if($validationReq->isSubmitted())
        {
            try {
                $currency = new CurrencyModel($validationNum->checkToCorrectAmount($_POST['amount']), $defValidation->checkToPost('curr_name'));
                $course = new BankService();
                $amount = $currency->getAmount();
                $content = $course->exchange($_POST['bank'], $currency->getCurrName(), $currency->getAmount());
            }
            catch(InvalidAmountException | CurrencyNotFoundException | IncorrectCurrencyNameException  $e)
            {
                $error = $e->getMessage();
            }
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