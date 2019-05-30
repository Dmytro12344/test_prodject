<?php


namespace CurrencyExchange;


class BankService
{

    private $banks = [];

    public function __construct()
    {
        $this->add(new PrivatBank());
        $this->add(new SomeBank());
        $this->add(new OpenExchange());
    }


    private function getCourse(string $bankName, string $currName) : float
    {
        foreach($this->banks as $bank)
        {
            if($bank->getBankName() === $bankName)
            {
                return $this->getInstance($bank)->getCourse($currName);
            }
        }
        throw new \Exception\IncorrectCurrencyNameException();
    }



    public function exchange(string $bankName, string $currName, float $amount) : float
    {
        if($this->getInstance('CurrencyExchange\\'. $bankName)->actionToConvert() === '/') {
            return  $amount / $this->getCourse($bankName, $currName);
        } else {
            return  $amount *$this->getCourse($bankName, $currName);
        }
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