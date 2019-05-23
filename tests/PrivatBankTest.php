<?php


use PHPUnit\Framework\TestCase;
use CurrencyExchange\PrivatBank;


class PrivatBankTest extends TestCase
{
    private $bank;

    protected function setUp() : void
    {
        $this->bank = new PrivatBank();
    }

    protected function tearDown(): void
    {
        $this->bank = NULL;
    }

    public function testGetCourse__with_correct_arg() : void
    {
        $result = $this->bank->getCourse('EUR');
        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertNotEmpty($result);
        $this->assertIsNotArray($result);
        $this->assertIsNotString($result);
    }

    public function testGetCourse_with_incorrect_arg() : void
    {
        $result = $this->bank->getCourse('It\'s incorrect argument' );
        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertEmpty($result); // 0.0 === empty
        $this->assertIsNotArray($result);

        $this->assertEquals(0, $result);
        $this->assertEquals(0.0, $result);
    }
}