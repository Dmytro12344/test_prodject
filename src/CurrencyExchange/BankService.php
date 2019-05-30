<?php


namespace CurrencyExchange;


class BankService
{
    private $banks = [];

    public function __construct()
    {
        $this->add(new PrivatBank());
        $this->add(new OpenExchange());
    }

    private function getCourse(string $bankName, string $currName) : float
    {
        foreach($this->banks as $bank)
        {
            if($bank->getBankName() === $bankName)
            {
                return $bank->getCourseToFrom($currName);
            }
        }
        return false;
    }

    public function exchange(string $bankName, string $currName, float $amount) : float
    {
        return $this->getCourse($bankName, $currName) * $amount;
    }

    private function getInstance($bank) : object
    {
        return new $bank;
    }

    public function add(Bank $class) : void
    {
        $this->banks[] = $class;
    }
}