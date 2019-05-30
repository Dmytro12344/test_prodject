<?php


namespace CurrencyExchange;
use Lib\BankWrap;


class OpenExchange implements Bank
{
    public function getCourse(string $course): float
    {
        $courses = $this->getBankWrap()->getApiContent('https://openexchangerates.org/api/latest.json?app_id=3c19f95a3b9444d6897430da7e5a3f25');

        if(is_array($courses))
        {
            if(!empty($courses['rates'][$course]))
            {
                $course_curr = $courses['rates'][$course];
                return $course_curr;
            }
            throw new \Exception\CurrencyNotFoundException();
        }
        throw new \Exception\IncorrectCurrencyNameException();
    }


    public function getBankName(): string
    {
        return 'OpenExchange';
    }


    private function getBankWrap() : object
    {
        return new BankWrap();
    }


    public function getCourseToFrom(string $course): float
    {
        return $this->getCourse($course);
    }
}