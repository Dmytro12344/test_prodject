<?php


namespace Model;


class CurrencyModel
{
    private $amount;
    private $currName;


    public function __construct($arr)
    {
        $this->amount = $arr['amount'];
        $this->currName = $arr['curr_name'];
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