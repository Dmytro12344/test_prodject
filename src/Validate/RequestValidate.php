<?php


namespace Validate;


use Exception\CurrencyNotFoundException;
use Exception\IncorrectCurrencyNameException;
use Exception\InvalidAmountException;

class RequestValidate
{

    public function fullRequestCheck(object $object) : string
    {
        try {
            $this->checkToCorrectAmount($object->getAmount());
            $this->correctCurrencyName($object->getCurrName());
            $this->correctBankName($object->getBankName());
            $error = '';
            }
        catch(InvalidAmountException | CurrencyNotFoundException | IncorrectCurrencyNameException  $e)
        {
            $error = $e->getMessage();
            return $error;
        }

        return $error;
    }


    public function checkToCorrectAmount($date) : float
    {
        if($date < 0 || empty($date))
        {
            throw new \Exception\InvalidAmountException();
        }
        return $date;
    }

    public function correctBankName($bankName) : string
    {
        if($bankName === null || empty($bankName))
        {
            throw new CurrencyNotFoundException();
        }
        return $bankName;
    }

    public function correctCurrencyName($currName) : string
    {
        if($currName === null || empty($currName))
        {
            throw new \Exception\IncorrectCurrencyNameException();
        }
        return $currName;
    }









}