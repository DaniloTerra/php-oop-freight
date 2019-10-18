<?php

namespace Freight;

use ReflectionClass;

/**
 * Usar trait
 */

class Enum
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Enum constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        try {
            $self = new ReflectionClass(static::class);

            $constants = $self->getConstants();

            if (!in_array($currency, $constants)) {
                $className = static::class;
                throw new \InvalidArgumentException("Invalid value for $className ENUM");
            }

            $this->value = $currency;
        } catch (\ReflectionException $error) {}
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}