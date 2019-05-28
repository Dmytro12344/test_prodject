<?php

namespace CurrencyExchange;

interface Bank
{

    public function getCourse() : float;

    public function getBankName() : string;

}