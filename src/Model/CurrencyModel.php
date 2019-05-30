<?php


namespace Model;


class CurrencyModel
{
    private $amount;
    private $currName;

    public function __construct(float $amount,string $currName)
    {
        $this->amount = $amount;
        $this->currName = $currName;
    }

    public function getAmount() : float
    {
        return $this->amount;
    }

    public function getCurrName() : string
    {
        return $this->currName;
    }

}