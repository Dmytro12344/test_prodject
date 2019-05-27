<?php

use PHPUnit\Framework\TestCase;
use CurrencyExchange\BankService;

class BankServiceTest extends TestCase
{


    public function testGetCourseBankService__with_correct_arg() : void
    {
        $bank = $this->getMockBuilder(CurrencyExchange\PrivatBank::class)->getMock();
        $bank->expects($this->once())->method('getCourse')->willReturn(17.2258);

        $service = $this->getMockBuilder(BankService::class )->setMethods(['getInstance'])->getMock();
        $service->expects($this->once())->method('getInstance')->willReturn($bank);

        $this->assertEquals(17.2258, $service->getCourse('USD'));
    }


}