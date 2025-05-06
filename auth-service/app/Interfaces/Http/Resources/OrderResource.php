<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->external_id,
            'user_id' => $this->user_id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'products' => $this->products,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
