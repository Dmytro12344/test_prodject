<?php

namespace Lib;

use GuzzleHttp\Client;

class BankWrap
{

    public function getApiContent(string $url) : array
    {
        $client = new Client();
        $responses = $client
            ->request('GET', $url)
            ->getBody()
            ->getContents();

        $content =  json_decode($responses, true);
        return $content;
    }
}