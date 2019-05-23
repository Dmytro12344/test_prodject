<?php


namespace CurrencyExchange;


class BankService
{
    public function getCourse(Bank $current_bunk, $currency) : float
    {
        return $current_bunk->getCourse($currency);
    }

    protected function getInstance() : object
    {
        return new PrivatBank();
    }
}