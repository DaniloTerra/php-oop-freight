<?php

namespace Freight;

final class PositiveDecimal
{
    const MINIMUM = 0;
    const MAXIMUM = PHP_FLOAT_MAX;

    /**
     * @var float
     */
    private $value;

    /**
     * PositiveDecimal constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        if ($value < static::MINIMUM || $value > static::MAXIMUM) {
            $className = static::class;
            throw new \InvalidArgumentException("Invalid value for $className");
        }

        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
