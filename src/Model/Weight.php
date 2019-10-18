<?php

namespace Freight;

final class Weight
{
    /**
     * @var WeightUnit
     */
    private $unit;

    /**
     * @var PositiveDecimal
     */
    private $value;

    /**
     * Weight constructor.
     * @param WeightUnit $unit
     * @param PositiveDecimal $value
     */
    public function __construct(WeightUnit $unit, PositiveDecimal $value)
    {
        $this->unit = $unit;
        $this->value = $value;
    }

    /**
     * @return WeightUnit
     */
    public function getUnit(): WeightUnit
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
     * @return Weight
     */
    public function toKilo(): self
    {
        if (WeightUnit::G === $this->unit->getValue()) {
            $value = $this->value->getValue() / 1000;
            return new self(new WeightUnit(WeightUnit::KG), new PositiveDecimal($value));
        }

        if (WeightUnit::KG === $this->unit->getValue()) {
            $value = $this->value->getValue() * 1;
            return new self(new WeightUnit(WeightUnit::KG), new PositiveDecimal($value));
        }

        $value = $this->value->getValue() * 1000;
        return new self(new WeightUnit(WeightUnit::KG), new PositiveDecimal($value));
    }
}
