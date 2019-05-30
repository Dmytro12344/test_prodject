<?php


namespace Validate;


use Exception\CurrencyNotFoundException;
use Exception\IncorrectCurrencyNameException;
use Exception\InvalidAmountException;

class RequestValidate
{

    public function fullRequestCheck(object $object) : string
    {
        if($object->getSubmit()) {
            try {
                $amount = $this->checkToCorrectAmount($object->getAmount());
                $currencyName = $this->correctCurrencyName($object->getCarrName);
            }
            catch(InvalidAmountException | CurrencyNotFoundException | IncorrectCurrencyNameException  $e)
            {
                return $e->getMessage();
            }
        }
        return '';
    }


    public function checkToCorrectAmount($date) : float
    {
        if($date < 0 || empty($date))
        {
            throw new \Exception\InvalidAmountException();
        }
        return $date;
    }

   /* public function correctBankName() : string
    {

    }*/

    public function correctCurrencyName($currName) : string
    {
        if($currName === null || empty($currName))
        {
            throw new \Exception\IncorrectCurrencyNameException();
        }
        return $currName;
    }









}