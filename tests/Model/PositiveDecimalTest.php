<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\PositiveDecimal
 */
final class PositiveDecimalTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $positiveDecimal = new PositiveDecimal(10.00);

        static::assertInstanceOf(PositiveDecimal::class, $positiveDecimal);
    }

    /**
     * @covers ::getValue
     */
    public function testGetValue()
    {
        $positiveDecimal = new PositiveDecimal(10.00);

        static::assertEquals(10.00, $positiveDecimal->getValue());
    }

    /**
     * @covers ::__construct
     */
    public function testFailureWhenTryToConstructWithInvalidValue()
    {
        $className = PositiveDecimal::class;

        static::expectException(\InvalidArgumentException::class);
        static::expectExceptionMessage("Invalid value for $className");

        new PositiveDecimal(-10.00);
    }
}