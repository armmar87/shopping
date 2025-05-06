<?php

namespace App\Domain\Services\Pricing;

class WithoutTaxStrategy implements \PricingStrategyInterface
{
    public function calculate(float $price): float
    {
        return $price;
    }
}
