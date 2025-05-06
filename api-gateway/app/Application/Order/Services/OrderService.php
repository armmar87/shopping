<?php

namespace App\Application\Order\Services;

use App\Domain\Order\DTOs\CreateOrderDTO;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Enums\OrderStatusEnum;
use Illuminate\Support\Str;

class OrderService
{

    public function createOrder(CreateOrderDTO $dto): Order
    {
        // 1. Verify product availability from Product Service
        $available = $this->productService->checkAvailability($dto->items);
        if (!$available) {
            throw new \Exception("Some products are not available.");
        }

        // 2. Calculate total price
        $total = $this->productService->calculateTotal($dto->items);

        // 3. Create Order
        return Order::create([
            'external_id' => Str::uuid(),
            'user_id' => $dto->userId,
            'products' => collect($dto->items)->map(fn($item) => [
                'product_id' => $item->productId,
                'quantity' => $item->quantity,
            ]),
            'total_price' => $total,
            'status' => OrderStatusEnum::PENDING->value,
        ]);
    }
}
