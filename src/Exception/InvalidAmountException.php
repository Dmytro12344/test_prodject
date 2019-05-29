<?php


namespace Exception;


use Throwable;

class InvalidAmountException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Incorrect amount");
    }
}