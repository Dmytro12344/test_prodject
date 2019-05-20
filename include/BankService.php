<?php

namespace includes;

require_once(__DIR__ . "../vendor/autoload.php");
use GuzzleHttp\Client;

class BankService
{


    public static function getApiContent($url){

        $client = new Client();

        $responses = $client
            ->request('GET', $url)
            ->getBody()
            ->getContents();

        $content =  json_decode($responses, true);

        return $content;

    }


}