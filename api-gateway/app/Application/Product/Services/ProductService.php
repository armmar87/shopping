<?php

namespace App\Application\Product\Services;

use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Domain\Product\DTOs\ProductDTO;
use App\Domain\Product\Entities\Product;
use Illuminate\Support\Collection;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {}

    public function list(): Collection
    {
        return $this->productRepository->all();
    }

    public function get(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    public function create(ProductDTO $dto): Product
    {
        return $this->productRepository->store($dto);
    }

    public function update(int $id, ProductDTO $dto): ?Product
    {
        return $this->productRepository->update($id, $dto);
    }

    public function delete(int $id): bool
    {
        return $this->productRepository->delete($id);
    }
}

