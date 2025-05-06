<?php

namespace App\Domain\Product\ValueObjects;

class Price
{
    public function __construct(
        public float $amount,
        public string $currency
    ) {}
}
