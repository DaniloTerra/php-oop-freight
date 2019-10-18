<?php

namespace Freight;

final class Money
{
    /**
     * @var Currency
     */
    private $currency;

    /**
     * @var PositiveDecimal
     */
    private $value;

    /**
     * Money constructor.
     * @param Currency $currency
     * @param PositiveDecimal $value
     */
    public function __construct(Currency $currency, PositiveDecimal $value)
    {
        $this->currency = $currency;
        $this->value = $value;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return PositiveDecimal
     */
    public function getValue(): PositiveDecimal
    {
        return $this->value;
    }
}
