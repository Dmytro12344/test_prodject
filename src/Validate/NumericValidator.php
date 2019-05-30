<?php


namespace Validate;


class NumericValidator
{
    public function checkToCorrectAmount($date) : float
    {
        if($date < 0 || empty($date))
        {
            throw new \Exception\InvalidAmountException();
        }
        return $date;
    }
}