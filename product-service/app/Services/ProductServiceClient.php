<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProductServiceClient
{
    public function checkAvailability(array $items): bool
    {
        $response = Http::post(config('services.product_service.url') . '/api/products/check-availability', [
            'items' => $items,
        ]);

        return $response->ok() && $response->json('available') === true;
    }
}
