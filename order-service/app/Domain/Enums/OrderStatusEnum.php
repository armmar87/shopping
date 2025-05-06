<?php

namespace App\Domain\Order\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case SHIPPED = 'shipped';
    case CANCELLED = 'cancelled';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
