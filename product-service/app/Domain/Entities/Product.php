<?php

namespace App\Domain\Product\Entities;

use App\Models\DigitalProduct;
use App\Models\PhysicalProduct;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Product\Enums\ProductTypeEnum;
use App\Domain\Product\ValueObjects\Price;
use App\Domain\Product\ValueObjects\Sku;

abstract class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price_amount',
        'price_currency',
        'sku_code',
        'type',
        'attributes'
    ];

    protected $casts = [
        'type' => ProductTypeEnum::class,
        'attributes' => 'array',
    ];

    public function getPrice(): Price
    {
        return new Price($this->price_amount, $this->price_currency);
    }

    public function getSku(): Sku
    {
        return new Sku($this->sku_code);
    }

    public function getConcreteInstance(): DigitalProduct|PhysicalProduct
    {
        return match ($this->type) {
            ProductTypeEnum::DIGITAL => new DigitalProduct($this->attributesToArray()),
            ProductTypeEnum::PHYSICAL => new PhysicalProduct($this->attributesToArray()),
        };
    }
}

