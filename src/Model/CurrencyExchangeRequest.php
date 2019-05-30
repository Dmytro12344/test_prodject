<?php


namespace Model;


class CurrencyExchangeRequest
{
    private $amount;
    private $currName;
    private $submit;

    public function __construct(array $arr)
    {
        $this->amount = $arr['amount'] ?? 1;
        $this->currName = $arr['curr_name'] ?? '';
        $this->submit = isset($_POST['submit']) ? true : false;
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
}