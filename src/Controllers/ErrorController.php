<?php


namespace Controllers;


class ErrorController
{

    public function page404() : void
    {
        header("Location: http://example.com/page_not_found"); /* Перенаправление браузера */


        exit;
    }
}