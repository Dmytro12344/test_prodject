<?php


namespace Exception;


use Throwable;

class IncorrectCurrencyNameException extends \Exception
{

    public function __construct($message = "")
    {
        parent::__construct("Incorrect currency name");
    }


}