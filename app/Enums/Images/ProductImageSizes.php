<?php

namespace App\Enums\Images;

enum ProductImageSizes: int
{
    case small  = 200;
    case medium = 500;
    case large  = 1000;

    /**
     * @return array
     */
    public static function asArray(): array
    {
        return array_combine(
            array_map(fn($case) => strtolower($case->name), self::cases()),
            array_map(fn($case) => $case->value, self::cases())
        );
    }
}
