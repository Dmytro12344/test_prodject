<?php

namespace CurrencyExchange;

interface Bank
{

    public function getCourse(string $course) : float;

    public function getBankName() : string;

}