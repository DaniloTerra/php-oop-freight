<?php

namespace Freight;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Freight\Weight
 */
final class WeightTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstance()
    {
        $weight = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(10)
        );

        static::assertInstanceOf(Weight::class, $weight);
    }

    /**
     * @covers ::getValue
     * @covers ::getUnit
     */
    public function testGetValues()
    {
        $weight = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(10)
        );

        static::assertEquals(new WeightUnit(WeightUnit::KG), $weight->getUnit());
        static::assertEquals(new PositiveDecimal(10), $weight->getValue());
    }

    /**
     * @covers ::toKilo
     */
    public function testToKiloWhenUnitIsG()
    {
        $weight = new Weight(
            new WeightUnit(WeightUnit::G),
            new PositiveDecimal(10000.00)
        );

        $kilo = $weight->toKilo();

        $expected = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(10.00)
        );

        static::assertEquals($expected, $kilo);
    }

    /**
     * @covers ::toKilo
     */
    public function testToKiloWhenUnitIsKG()
    {
        $weight = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(1000.00)
        );

        $kilo = $weight->toKilo();

        $expected = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(1000.00)
        );

        static::assertEquals($expected, $kilo);
    }

    /**
     * @covers ::toKilo
     */
    public function testToKiloWhenUnitIsTon()
    {
        $weight = new Weight(
            new WeightUnit(WeightUnit::TON),
            new PositiveDecimal(2.00)
        );

        $kilo = $weight->toKilo();

        $expected = new Weight(
            new WeightUnit(WeightUnit::KG),
            new PositiveDecimal(2000.00)
        );

        static::assertEquals($expected, $kilo);
    }
}
