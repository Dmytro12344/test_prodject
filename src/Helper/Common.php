<?php


namespace Helper;


class Common
{
    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            return true;
        }
        return false;
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPathUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?'))
        {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }


}