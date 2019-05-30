<?php

namespace Controllers;

use Model\CurrencyModel;
use Validate\NumericValidator;
use Validate\RequestValidate;
use Validate\DefinedValidate;
use CurrencyExchange\BankService;
use Lib\TwigWrap;



class CurrencyController
{

    public function exchange() : void
    {
        $twig = new TwigWrap();
        $validationReq = new RequestValidate();
        $validationNum = new NumericValidator();
        $defValidation = new DefinedValidate();

        if($validationReq->isSubmitted())
        {
            try {
                $currency = new CurrencyModel($validationNum->aboveZero($_POST['amount']), $defValidation->checkToPost('curr_name'));
                $course = new BankService();
                $contents['exchangeRte'] = $course->exchange($_POST['bank'], $currency->getCurrName(), $currency->getAmount());
            }
            catch(\Exception\IncorrectCurrencyNameException $e)
            {
                $contents['errCurrencyName'] = $e->getMessage();
            }
            catch(\Exception\InvalidAmountException $e)
            {
                $contents['errAmount'] = $e->getMessage();
            }
            catch(\Exception\CurrencyNotFoundException $e){
                $contents['errCurrencyNotFound'] = $e->getMessage();
            }
        }

            $twig->render(['contents' => $contents], 'demo.twig');

    }


}