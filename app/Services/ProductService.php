<?php

namespace App\Services;

use App\Domain\Product\DTOs\ProductDTO;
use App\Models\Product;

class ProductService
{
    public function create(ProductDTO $dto): Product
    {
        return Product::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'sku' => $dto->sku,
            'price' => $dto->price,
            'type' => $dto->type->value,
            'attributes' => $dto->attributes,
        ]);
    }

}
