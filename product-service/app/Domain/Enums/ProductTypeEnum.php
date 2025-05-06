<?php

namespace App\Domain\Product\Enums;

enum ProductTypeEnum: string
{
    case DIGITAL = 'digital';
    case PHYSICAL = 'physical';


    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
