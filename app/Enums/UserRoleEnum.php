<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case STAFF = 'staff';
    case ADMIN = 'admin';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
