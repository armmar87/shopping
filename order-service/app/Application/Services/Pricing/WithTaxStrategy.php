<?php

namespace App\Domain\Services\Pricing;

class WithTaxStrategy implements \PricingStrategyInterface
{
    private const TAX_RATE = 0.2; // 20% tax

    public function calculate(float $price): float
    {
        return $price * (1 + self::TAX_RATE);
    }
}
