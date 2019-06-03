<?php


namespace CurrencyExchange;


use Exception\CurrencyNotFoundException;

class BankService
{
    private $banks = [];

    public function __construct()
    {
        $this->add(new PrivatBank());
        $this->add(new OpenExchange());
    }

    private function getCourse(string $bankName, string $currName, bool $revers) : float
    {
        foreach($this->banks as $bank)
        {
            if($bank->getBankName() === $bankName)
            {
                if(!$revers) {
                    return $bank->getCourseFromTo($currName);
                }
                return $bank->getReversCourse($currName);
            }
        }
        throw new CurrencyNotFoundException();
    }

    public function exchange(string $bankName, string $currName, float $amount, bool $revers) : float
    {
        return $this->getCourse($bankName, $currName, $revers) * $amount;
    }

    public function add(Bank $class) : void
    {
        $this->banks[] = $class;
    }
}