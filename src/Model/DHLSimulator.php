<?php

namespace Freight;

/**
 * Simulador de frete
 */
final class DHLSimulator implements Simulator
{
    const CURRENCY = 'USD';
    const COST = 0.30;

    /**
     * @var Money
     */
    private $cost;

    /**
     * CorreiosSimulator constructor.
     */
    public function __construct()
    {
        $this->cost = new Money(new Currency(self::CURRENCY), new PositiveDecimal(self::COST));
    }

    /**
     * Simula o calculo de frete retornando o valor monetário a ser cobrado
     *
     * @param Weight   $weight
     * @param Distance $distance
     * @return Money
     */
    public function simulate(Weight $weight, Distance $distance): Money
    {
        $kilos = $weight->toKilo();
        $kilometers = $distance->toKilometer();

        $value = $this->cost->getValue()->getValue() * $kilos->getValue()->getValue() * $kilometers->getValue()->getValue();

        return new Money($this->cost->getCurrency(), new PositiveDecimal($value));
    }
}
