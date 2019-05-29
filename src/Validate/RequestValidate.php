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
            }
            return true;
        }
        return false;
    }

    public function getCorrectNumber($date) : float
    {
        if($date < 0)
        {
            return $date * (-1);
        }
        return $date;
    }





        public function getRequestInstance() : object
    {
        return new Request();
    }
}