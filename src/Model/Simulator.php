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
     * @param Money    $cost
     * @param Weight   $weight
     * @param Distance $distance
     * @return Money
     */
    public function simulate(Money $cost, Weight $weight, Distance $distance): Money
    {
        $kilos = $weight->toKilo();
        $kilometers = $distance->toKilometer();

        $value = $cost->getValue()->getValue() * $kilos->getValue()->getValue() * $kilometers->getValue()->getValue();

        return new Money($cost->getCurrency(), new PositiveDecimal($value));
    }
}
