<?php


namespace Validate;


class NumericValidator
{
    public function aboveZero($date) : float
    {
        if($date < 0)
        {
            throw new \Exception\InvalidAmountException();
        }
        return $date;
    }
}