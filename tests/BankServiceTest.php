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

    protected function tearDown(): void
    {
        $this->bank_service = null;
    }


    public function testGetCourseBankService__with_correct_arg() : void
    {
        $bank = $this->getMockBuilder(PrivatBank::class)->setMethods(['getCourse'])->getMock();

        $bank->expects($this->once())
            ->method('getCourse')
            ->with($this->equalTo(1.1));

       /* $BunkService = $this->getMockBuilder(BankService::class)->setMethods(['getInstance'])->getMock();

        $BunkService->expects($this->once())
            ->method('getInstance')
            ->willReturn($bank); */

        $result = $this->bank_service->getCourse($bank, 1.1);

        $this->assertIsFloat($result);



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