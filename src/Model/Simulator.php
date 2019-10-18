<?php

namespace Freight;

interface Simulator
{
    public function simulate(Weight $weight, Distance $distance): Money;
}