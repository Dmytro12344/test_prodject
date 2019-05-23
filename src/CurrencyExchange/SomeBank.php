<?php


namespace CurrencyExchange;


class SomeBank implements Bank
{
    public function getCourse() : float
    {
        return 3;
    }
}