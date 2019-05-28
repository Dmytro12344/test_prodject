<?php


namespace Validate;
use Request\Request;

class RequestValidate
{
    public function isSubmitted(): bool
    {
        if(isset($_POST['submit']))
        {
            return true;
        } else {
            return false;
        }
    }

    public function isValid() : bool
    {
        foreach($this->getRequestInstance()->getRequest() as $item)
        {
            if(!isset($item) || empty($item) || $item === null)
            {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getRequestInstance() : object
    {
        return new Request();
    }
}