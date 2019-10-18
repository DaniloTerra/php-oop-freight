<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\Money
 */
final class MoneyTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $money = new Money(new Currency(Currency::BRL), new PositiveDecimal(10.00));

        static::assertInstanceOf(Money::class, $money);
    }

    /**
     * @covers ::getCurrency
     * @covers ::getValue
     */
    public function testGetValue()
    {
        $money = new Money(new Currency(Currency::BRL), new PositiveDecimal(10.00));

        static::assertEquals(new Currency(Currency::BRL), $money->getCurrency());
        static::assertEquals(new PositiveDecimal(10.00), $money->getValue());
    }

}