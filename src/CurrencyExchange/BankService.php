<?php


namespace CurrencyExchange;


class BankService
{
    public function getCourse(Bank $current_bunk) : float
    {
        return $current_bunk->getCourse();
    }
}