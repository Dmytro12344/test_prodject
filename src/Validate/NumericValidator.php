<?php


namespace Validate;


class NumericValidator
{
    public function aboveZero($date) : float
    {
        if($date < 0)
        {
            return $date * (-1);
        }
        return $date;
    }
}