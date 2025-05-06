<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\DTOs\ProductDTO;
use App\Domain\Product\Entities\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function all(): Collection;

    public function findById(int $id): ?Product;

    public function store(ProductDTO $dto): Product;

    public function update(int $id, ProductDTO $dto): ?Product;

    public function delete(int $id): bool;
}

