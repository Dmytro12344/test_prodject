<?php


namespace CurrencyExchange;


class BankService
{
    public function getCourse($currency) : float
    {
        return $this->getInstance()->getCourse($currency);
    }

    public function getInstance() : object
    {
        return new PrivatBank();
    }
}