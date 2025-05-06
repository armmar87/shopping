<?php

namespace App\Domain\Order\DTOs;

class OrderItemDTO
{
    public function __construct(
        public int $productId,
        public int $quantity,
    ) {}
}
