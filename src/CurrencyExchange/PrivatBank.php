<?php


namespace CurrencyExchange;

use Lib\BankWrap;

class PrivatBank implements Bank
{

    public function getCourse(string $course = 'USD') : float
    {
        $courses = $this->getBankWrap()->getApiContent('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
        $course_curr = 0;
        if(isset($courses) && !empty($course))
        {
            foreach ($courses as $item)
            {
                if ($item['ccy'] === $course)
                {
                    $course_curr = $item['buy'];
                    return $course_curr;
                }
            }
        }
        return $course_curr;
    }

    public function getBankWrap() : object
    {
        return new BankWrap();
    }

}