<?php


namespace CurrencyExchange;
use Lib\BankWrap;


class OpenExchange implements Bank
{
    public function getCourse(string $course = 'UAH'): float
    {
        $courses = $this->getBankWrap()->getApiContent('https://openexchangerates.org/api/latest.json?app_id=3c19f95a3b9444d6897430da7e5a3f25');

        if(isset($courses) && !empty($course))
        {
            if(!empty($courses['rates'][$course]) && $courses['rates'][$course] !== null)
            {
                $course_curr = $courses['rates'][$course];
                return $course_curr;
            }
        }
        throw new \Exception('Current currency not found');

    }

    public function getBankName(): string
    {
        return 'OpenExchange';
    }

    public function getBankWrap() : object
    {
        return new BankWrap();
    }
}