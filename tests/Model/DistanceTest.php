<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\Distance
 */
final class DistanceTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $distance = new Distance(
            new DistanceUnit(DistanceUnit::KM),
            new PositiveDecimal(2.5)
        );

        static::assertInstanceOf(Distance::class, $distance);
    }

    /**
     * @covers ::getValue
     * @covers ::getUnit
     */
    public function testGetValues()
    {
        $distance = new Distance(
            new DistanceUnit(DistanceUnit::KM),
            new PositiveDecimal(2.5)
        );

        static::assertEquals(new DistanceUnit(DistanceUnit::KM), $distance->getUnit());
        static::assertEquals(new PositiveDecimal(2.5), $distance->getValue());
    }

    /**
     * @covers ::fromMeter
     */
    public function testFromMeter()
    {
        $distance = Distance::fromMeter(10);

        static::assertEquals(new DistanceUnit(DistanceUnit::M), $distance->getUnit());
        static::assertEquals(new PositiveDecimal(10), $distance->getValue());
    }

    /**
     * @covers ::fromKilometer
     */
    public function testFromKilometer()
    {
        $distance = Distance::fromKilometer(13);

        static::assertEquals(new DistanceUnit(DistanceUnit::KM), $distance->getUnit());
        static::assertEquals(new PositiveDecimal(13), $distance->getValue());
    }

    /**
     * @covers ::toKilometer
     */
    public function testToKilometerWhenDistanceUnitIsMeter()
    {
        $distance = Distance::fromMeter(2000);

        $kilometer = $distance->toKilometer();

        static::assertEquals(Distance::fromKilometer(2), $kilometer);
    }

    /**
     * @covers ::toKilometer
     */
    public function testToKilometerWhenDistanceUnitIsKilometer()
    {
        $distance = Distance::fromKilometer(50);

        $kilometer = $distance->toKilometer();

        static::assertEquals(Distance::fromKilometer(50), $kilometer);
    }
}