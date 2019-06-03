<?php

namespace CurrencyExchange;

interface Bank
{

    public function getCourse(string $course) : float;

    public function getBankName() : string;

    public function getCourseFromTo(string $course) : float;

    public function getReversCourse(string $course) : float;

}