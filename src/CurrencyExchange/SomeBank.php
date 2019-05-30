<?php


namespace CurrencyExchange;


class SomeBank implements Bank
{
    public function getCourse(string $coure) : float
    {
        return 3;
    }

    public function getBankName() : string
    {
        return 'SomeBank';
    }
}