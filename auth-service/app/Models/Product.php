<?php

namespace App\Models;

use App\Domain\Product\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sku',
        'price',
        'type',
        'attributes',
    ];

    protected $casts = [
        'type' => ProductTypeEnum::class,
        'attributes' => 'array',
    ];

    public function getConcreteInstance(): DigitalProduct|PhysicalProduct
    {
        return match ($this->type) {
            ProductTypeEnum::DIGITAL => new DigitalProduct($this->attributesToArray()),
            ProductTypeEnum::PHYSICAL => new PhysicalProduct($this->attributesToArray()),
        };
    }
}
