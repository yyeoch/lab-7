<?php

namespace Tests\Unit;

use App\Services\Currencies\Contracts\CurrencyExchangeInterface;
use App\Services\Currencies\ConvertCurrencyService;
use PHPUnit\Framework\TestCase;

class ConvertCurrencyServiceTest extends \Tests\TestCase
{
    /**
     * @var CurrencyExchangeInterface
     */
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->app->make(CurrencyExchangeInterface::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testServiceInstance()
    {
        $this->assertInstanceOf(CurrencyExchangeInterface::class, $this->service);
    }

    public function testList()
    {
        $res = $this->service->list();
        $this->assertTrue(true);
    }
}
