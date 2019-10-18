<?php

namespace Freight;

/**
 * Simulador de frete
 */
final class Simulator
{
    /**
     * Simula o calculo de frete retornando o valor monetário a ser cobrado
     *
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

        return new Money($costKiloPerKilometer->getCurrency(), new PositiveDecimal($value));
    }
}
