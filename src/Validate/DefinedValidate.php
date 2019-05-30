<?php


namespace Validate;


class DefinedValidate
{
    public function checkToPost($date) : string
    {
        if(isset($_POST[$date]))
        {
            return $_POST[$date];
        }
        throw new \Exception\IncorrectCurrencyNameException();
    }
}