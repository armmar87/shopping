<?php

namespace App\Domain\User\Enums;

enum RoleEnum: string
{
    case USER = 'user';
    case ADMIN = 'admin';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
