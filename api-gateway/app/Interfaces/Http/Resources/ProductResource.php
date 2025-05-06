<?php

namespace App\Interfaces\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource  extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => [
                'amount' => $this->price,
                'currency' => $this->currency,
            ],
            'sku' => $this->sku_code,
            'type' => $this->type->value ?? $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
