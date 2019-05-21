<?php


namespace CurrencyExchange;

use Lib\BankWrap;

class PrivatBank implements Bank
{

    public function getCourse(string $course = 'USD') : float
    {
        $bank_service = new BankWrap();
        $courses = $bank_service->getApiContent('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
        $course_curr = 0;
        foreach($courses as $item){
            if($item['ccy'] == $course){
                $course_curr = $item['buy'];
                return $course_curr;
            }
        }
        return $course_curr;

    }

}