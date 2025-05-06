<?php

namespace App\Application\Order\Services;

use App\Application\Product\Services\ProductService;
use App\Domain\Order\DTOs\CreateOrderDTO;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Enums\CalculationTypeEnum;
use App\Domain\Order\Enums\OrderStatusEnum;
use Illuminate\Support\Str;

class OrderService
{

    private PricingStrategyInterface $pricingStrategy;

    public function __construct(CalculationTypeEnum $calculationType)
    {
        $this->setPricingStrategy($calculationType);
    }

    public function setPricingStrategy(string $calculationType): void
    {
        $this->pricingStrategy = match($calculationType) {
            CalculationTypeEnum::WITHOUT_TAX->value => new WithoutTaxStrategy(),
            CalculationTypeEnum::WITH_TAX->value  => new WithTaxStrategy()
        };
    }

    public function createOrder(CreateOrderDTO $dto): Order
    {
        // 2. Calculate total price
        $total = $this->pricingStrategy->calculate($dto->price);

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
