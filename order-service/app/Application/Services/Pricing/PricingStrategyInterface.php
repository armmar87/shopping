<?php

interface PricingStrategyInterface
{
    public function calculate(float $price): float;
}
