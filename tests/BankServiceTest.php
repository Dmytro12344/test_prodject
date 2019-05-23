<?php

use PHPUnit\Framework\TestCase;
use CurrencyExchange\BankService;
use CurrencyExchange\PrivatBank;

class BankServiceTest extends TestCase
{
    private $bank_service;
    private $bank;


    protected function setUp(): void
    {
        $this->bank_service = new BankService();
    }


    public function testGetCourseBankService__with_correct_arg() : void
    {
        $bank = $this->getMockBuilder(PrivatBank::class)->getMock();


        $bank->expects($this->once())
             ->method('getCourse')
             ->willReturn(mt_rand(5,5000000) * 0.1);

        $CurrentBank = $this->getMockBuilder(PrivatBank::class)
            ->setMethods(['getInstance'])
            ->getMock();

        $CurrentBank->expects($this->once())
            ->method('getInstance')
            ->willReturn($bank);

        $this->assertTrue(is_a($CurrentBank->getCourse([]), PrivatBank::class));


    }




      /*  $result = $this->bank_service->getCourse($this->bank, 'USD');
        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertNotEmpty($result);
        $this->assertIsNotArray($result);


    public function testGetCourseBankService_with_incorrect_arg() : void
    {
        $result = $this->bank_service->getCourse($this->bank, 'Its\'s incorrect argument');
        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertEmpty($result); // 0.0 === empty
        $this->assertIsNotArray($result);

        $this->assertEquals(0, $result);
        $this->assertEquals(0.0, $result);

    }  */

}