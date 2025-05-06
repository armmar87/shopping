<?php

namespace App\Infrastructure\Product\Repositories;

use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Domain\Product\DTOs\ProductDTO;
use App\Domain\Product\Entities\Product;
use Illuminate\Support\Collection;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function findById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function store(ProductDTO $dto): Product
    {
        return Product::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'price_amount' => $dto->price,
            'price_currency' => $dto->currency,
            'sku_code' => $dto->sku,
            'type' => $dto->type,
        ]);
    }

    public function update(int $id, ProductDTO $dto): ?Product
    {
        $product = Product::find($id);

        if (! $product) {
            return null;
        }

        $product->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'price_amount' => $dto->price,
            'price_currency' => $dto->currency,
            'sku_code' => $dto->sku,
            'type' => $dto->type,
        ]);

        return $product;
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id) > 0;
    }
}
