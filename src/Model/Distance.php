<?php

namespace Freight;

final class Distance
{
    /**
     * @var DistanceUnit
     */
    private $unit;

    /**
     * @var PositiveDecimal
     */
    private $value;

    /**
     * Distance constructor.
     * @param DistanceUnit $unit
     * @param PositiveDecimal $value
     */
    public function __construct(DistanceUnit $unit, PositiveDecimal $value)
    {
        $this->unit = $unit;
        $this->value = $value;
    }

    /**
     * @return DistanceUnit
     */
    public function getUnit(): DistanceUnit
    {
        return $this->unit;
    }

    /**
     * @return PositiveDecimal
     */
    public function getValue(): PositiveDecimal
    {
        return $this->value;
    }

    /**
     * @return Distance
     */
    public function toKilometer(): self
    {
        if (DistanceUnit::M === $this->unit->getValue()) {
            $value = $this->value->getValue() / 1000;
            return new self(new DistanceUnit(DistanceUnit::KM), new PositiveDecimal($value));
        }

        return new self($this->unit, $this->value);
    }

    /**
     * @param float $value
     * @return Distance
     */
    public static function fromMeter(float $value): self
    {
        return new self(
            new DistanceUnit(DistanceUnit::M),
            new PositiveDecimal($value)
        );
    }

    /**
     * @param float $value
     * @return Distance
     */
    public static function fromKilometer(float $value): self
    {
        return new self(
            new DistanceUnit(DistanceUnit::KM),
            new PositiveDecimal($value)
        );
    }
}
