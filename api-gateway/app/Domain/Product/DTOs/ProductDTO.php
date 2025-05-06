<?php

namespace App\Domain\Product\DTOs;

use App\Domain\Product\Enums\ProductTypeEnum;

readonly class ProductDTO
{
    public function __construct(
        public string $name,
        public ?string $description,
        public string $sku,
        public float $price,
        public string $currency,
        public ProductTypeEnum $type,
        public ?array $attributes = [],
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            description: $data['description'] ?? null,
            price: $data['price'],
            currency: $data['currency'],
            sku: $data['sku'],
            type: $data['type']
        );
    }
}
