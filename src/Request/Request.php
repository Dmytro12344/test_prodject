<?php


namespace Request;


class Request
{
    public function getRequest() : array
    {
        $Data = [];

        if($_REQUEST !== null || !empty($_REQUEST))
        {
            $Data = $_REQUEST;
        }

        return $Data;
    }

}