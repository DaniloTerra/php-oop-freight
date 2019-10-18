<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\DistanceUnit
 */
final class DistanceUnitTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $unit = new DistanceUnit(DistanceUnit::KM);

        static::assertInstanceOf(DistanceUnit::class, $unit);
    }

    /**
     * @covers ::getValue
     */
    public function testGetValue()
    {
        $unit = new DistanceUnit(DistanceUnit::KM);

        static::assertEquals(DistanceUnit::KM, $unit->getValue());
    }
}