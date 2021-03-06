<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\Simulator
 */
final class SimulatorTest extends TestCase
{
    /**
     * @covers ::simulate
     */
    public function testSimulate()
    {
        $simulator = new Simulator();

        $price = new Money(new Currency(Currency::BRL), new PositiveDecimal(10.00));
        $weight = new Weight(new WeightUnit(WeightUnit::KG), new PositiveDecimal(1.50));
        $distance = new Distance(new DistanceUnit(DistanceUnit::KM), new PositiveDecimal(100));

        $expected = new Money(new Currency(Currency::BRL), new PositiveDecimal(1500.00));

        static::assertEquals($expected, $simulator->simulate($price, $weight, $distance));
    }
}