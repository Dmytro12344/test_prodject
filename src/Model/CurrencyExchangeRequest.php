<?php


namespace Model;


class CurrencyExchangeRequest
{
    private $amount;
    private $currName;
    private $submit;
    private $revers;
    private $bank;

    public function __construct(array $arr)
    {
        $this->amount = isset($arr['amount']) ? (float)$arr['amount'] : 0;
        $this->submit = isset($arr['submit']) ? true : false;
        $this->revers = isset($arr['revers']) ? true : false;
        $this->currName = $arr['curr_name'] ?? '';
        $this->bank = $arr['bank'] ?? '';
    }

    public function getAmount() : float
    {
        return $this->amount;
    }

    public function getCurrName() : string
    {
        return $this->currName;
    }

    public function getSubmit() : bool
    {
        return $this->submit;
    }

    public function getRevers() : bool
    {
        return $this->revers;
    }

    public function getBankName() : string
    {
        return $this->bank;
    }
}