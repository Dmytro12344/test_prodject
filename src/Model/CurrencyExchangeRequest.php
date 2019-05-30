<?php


namespace Model;


class CurrencyExchangeRequest
{
    private $amount;
    private $currName;
    private $submit;
    private $bank;

    public function __construct(array $arr)
    {
        $this->amount = $arr['amount'] ?? 1;
        $this->currName = $arr['curr_name'] ?? '';
        $this->bank = $arr['bank'] ?? '';
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

    public function getBankName() : string
    {
        return $this->bank;
    }
}