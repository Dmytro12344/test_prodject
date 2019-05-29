<?php


namespace CurrencyExchange;


class BankService
{

    public $banks = [];

    public function __construct()
    {
        $this->add(new PrivatBank());
        $this->add(new SomeBank());
        $this->add(new OpenExchange());
    }


    public function getCourse(string $bankName, string $currName) : float
    {
        foreach($this->banks as $bank)
        {
            if($bank->getBankName() === $bankName)
            {
                try {
                    return $this->getInstance($bank)->getCourse($currName);
                }catch(\Exception $e){
                    echo $e->getMessage();
                }
            }
        }
        throw new \Exception('not found');
    }

    public function exchange(string $bankName, string $currName, float $amount) : float
    {
        return $this->getCourse($bankName, $currName) * $amount;
    }




    public function getInstance($bank) : object
    {
        return new $bank;
    }


    public function add(Bank $class) : void
    {
        $bank = new $class;
        $this->banks[] = $bank;
    }
}