<?php

namespace Freight;

final class Simulator
{
    /**
     * @param Money $costKiloPerKilometer
     * @param Weight $weight
     * @param Distance $distance
     * @return Money
     */
    public function simulate(Money $costKiloPerKilometer, Weight $weight, Distance $distance): Money
    {
        $kilos = $weight->toKilo();
        $kilometers = $distance->toKilometer();

        $value = $costKiloPerKilometer->getValue()->getValue() * $kilos->getValue()->getValue() * $kilometers->getValue()->getValue();

        return new Money(
            $costKiloPerKilometer->getCurrency(),
            new PositiveDecimal($value)
        );
    }
}