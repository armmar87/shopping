<?php

namespace App\Domain\Order\DTOs;

class CreateOrderDTO
{
    public function __construct(
        public int $userId,
        public array $items, // array of OrderItemDTO
    ) {}
}
