<?php


namespace CurrencyExchange;

use Lib\BankWrap;

class PrivatBank implements Bank
{

    public function getCourse(string $course = 'USD') : float
    {
        $courses = $this->getBankWrap()->getApiContent('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
        $course_curr = 0;
        foreach($courses as $item){
            if(!isset($item['ccy']) && $item['buy']){
                return $course_curr;
            }
            if($item['ccy'] === $course){
                $course_curr = $item['buy'];
                return $course_curr;
            }
        }
        return $course_curr;
    }

    protected function getBankWrap() : object
    {
        return new BankWrap();
    }

}