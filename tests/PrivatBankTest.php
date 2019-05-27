<?php


use PHPUnit\Framework\TestCase;
use CurrencyExchange\PrivatBank;


class PrivatBankTest extends TestCase
{
    private $bank;


    public function testGetCourseWithCorrectAgr() : void
    {
        $bankAPI = $this->getMockBuilder(\Lib\BankWrap::class)->getMock();
        $bankAPI->expects($this->once())->method('getApiContent')->willReturn([ 0 => ['ccy' => 'USD', 'buy' => 26.47478]]);
        $bank = $this->getMockBuilder(PrivatBank::class )->setMethods(['getBankWrap'])->getMock();
        $bank->expects($this->once())->method('getBankWrap')->willReturn($bankAPI);

        $this->assertEquals(26.47478, $bank->getCourse());
    }

    public function testGetCourseWithEmptyArg() :void
    {
        $bankAPI = $this->getMockBuilder(\Lib\BankWrap::class)->getMock();
        $bankAPI->expects($this->once())->method('getApiContent')->willReturn([]);
        $bank = $this->getMockBuilder(PrivatBank::class )->setMethods(['getBankWrap'])->getMock();
        $bank->expects($this->once())->method('getBankWrap')->willReturn($bankAPI);

        $this->assertEquals(0, $bank->getCourse());
    }

    public function testGetCourseWithIncorrectArg() : void
    {
        $bankAPI = $this->getMockBuilder(\Lib\BankWrap::class)->getMock();
        $bankAPI->expects($this->once())->method('getApiContent')->willReturn([ 1 => ['ccy' => 'QWERTY', 'buy' => 12 ]]);
        $bank = $this->getMockBuilder(PrivatBank::class )->setMethods(['getBankWrap'])->getMock();
        $bank->expects($this->once())->method('getBankWrap')->willReturn($bankAPI);

        $this->assertEquals(0, $bank->getCourse());
    }



}