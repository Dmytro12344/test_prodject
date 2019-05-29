<?php


namespace Exception;


class IncorrectArgumentException extends \Exception
{

    public function __construct() {
        parent::__construct("");
    }

}

