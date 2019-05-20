<?php


namespace src\CurrencyExchange;

use includes\BankService;


class PrivatBank implements Bank
{

    public function getCourse($course = 'USD'){

        $courses = BankService::getApiContent('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');

        $course_curr = false;

        foreach($courses as $item){
            if($item['ccy'] == $course){
                $course_curr = $item['buy'];
                break;
            }
        }
        return $course_curr;

    }

}