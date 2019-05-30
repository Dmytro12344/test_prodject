<?php


namespace CurrencyExchange;

use Lib\BankWrap;


class PrivatBank implements Bank
{
    public function getCourse(string $course) : float
    {
        $courses = $this->getBankWrap()->getApiContent('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');

        if(is_array($courses))
        {
            foreach ($courses as $item)
            {
                if ($item['ccy'] === $course)
                {
                    $course_curr = $item['buy'];
                    return $course_curr;
                }
            }
            throw new \Exception\CurrencyNotFoundException();
        }
        throw new \Exception\IncorrectCurrencyNameException();
    }

    public function getBankWrap() : object
    {
        return new BankWrap();
    }

    public function getBankName(): string
    {
        return 'PrivatBank';
    }

    public function getCourseToFrom(string $course): float
    {
        return 1 / $this->getCourse($course);
    }

}