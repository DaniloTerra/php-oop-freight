<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\Currency
 */
final class CurrencyTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $currency = new Currency(Currency::BRL);

        static::assertInstanceOf(Currency::class, $currency);
    }

    /**
     * @covers ::getValue
     */
    public function testGetValue()
    {
        $currency = new Currency(Currency::BRL);

        static::assertEquals(Currency::BRL, $currency->getValue());
    }

    /**
     * @covers ::__construct
     */
    public function testFailureWhenTryToConstructWithInvalidValue()
    {
        $className = Currency::class;

        static::expectException(\InvalidArgumentException::class);
        static::expectExceptionMessage("Invalid value for $className ENUM");

        new Currency('invalid enum value');
    }
}