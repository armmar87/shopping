<?php

namespace App\Domain\Product\ValueObjects;

class Sku
{
    public function __construct(
        public string $code
    ) {}
}
