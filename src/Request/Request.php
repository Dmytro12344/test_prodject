<?php


namespace Request;


class Request
{
    public function getPostData() : array
    {
        $postData = [];

        if($_POST !== null || !empty($_POST))
        {
            $postData = $_POST;
        }

        return $postData;
    }

    public function isSubmitted(): bool
    {
        if(isset($_POST['submit']))
        {
            return true;
        } else {
            return false;
        }
    }

    public function isValid()
    {
        foreach($this->getPostData() as $item)
        {
            if(!isset($item) || empty($item) || $item === null)
            {
                return false;
            } else {
                return true;
            }
        }
    }


}