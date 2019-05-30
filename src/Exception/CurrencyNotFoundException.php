<?php


namespace Exception;


class CurrencyNotFoundException extends \Exception
{
    public function __construct() {
        parent::__construct("Current currency not found");
    }

}