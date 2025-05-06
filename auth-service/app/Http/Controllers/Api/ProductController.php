<?php

namespace App\Http\Controllers\Api;
use App\Application\Product\Services\ProductService;
use App\Domain\Product\DTOs\ProductDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\StoreProductRequest;
use App\Interfaces\Http\Requests\UpdateProductRequest;
use App\Interfaces\Http\Resources\ProductResource;

class
ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {}

    public function index()
    {
        $products = $this->productService->list();

        return ProductResource::collection($products);
    }

    public function show(int $id)
    {
        $product = $this->productService->get($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->create($request->toDTO());

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $dto = ProductDTO::fromRequest($request->validated());
        $product = $this->productService->update($id, $dto);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

       return new ProductResource($product);
    }

    public function destroy(int $id)
    {
        if (! $this->productService->delete($id)) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['message' => 'Deleted successfully']);
    }
}
