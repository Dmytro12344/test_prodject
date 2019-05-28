<?php


namespace CurrencyExchange;


class BankService
{

    public $banks = [];

    public function __construct()
    {
        $this->add(PrivatBank::class);
        $this->add(SomeBank::class);
    }


    public function getCourseRaith(Bank $currentBank, string $currName, float $amount) : float
    {
        foreach($this->banks as $bank)
        {
            if($bank->getBankName() === $currentBank->getBankName())
            {
                return $this->getInstance($bank)->getCourse($currName) * $amount;
            }
        }
        return 0;
    }



    public function getInstance($bank) : object
    {
        return new $bank;
    }


    public function add($class=Bank::class) : void
    {
        $bank = new $class;
        $this->banks[] = $bank;
    }
}