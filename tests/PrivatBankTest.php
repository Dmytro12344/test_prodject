<?php


use PHPUnit\Framework\TestCase;
use CurrencyExchange\PrivatBank;


class PrivatBankTest extends TestCase
{
    private $bank;


    public function testGetCourseWithCorectArg()
    {
        $bankAPI = $this->getMockBuilder(\Lib\BankWrap::class)->getMock();
        $bankAPI->expects($this->once())->method('getApiContent')->willReturn([ 0 => ['ccy' => 'USD', 'buy' => 26.47478], 2 => ['ccy' => 'RUR', 'buy' => '123445']]);

        $bank = $this->getMockBuilder(PrivatBank::class )->setMethods(['getBankWrap'])->getMock();

        $bank->expects($this->once())->method('getBankWrap')->willReturn($bankAPI);



        $this->assertEquals(26.47478, $bank->getCourse());
    }



    /*public function testGetCourse_with_incorrect_arg() : void
    {
        $result = $this->bank->getCourse('It\'s incorrect argument' );
        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertEmpty($result); // 0.0 === empty
        $this->assertIsNotArray($result);

        $this->assertEquals(0, $result);
        $this->assertEquals(0.0, $result);
    } */
}