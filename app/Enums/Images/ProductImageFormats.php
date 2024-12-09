<?php

namespace App\Enums\Images;

enum ProductImageFormats: string
{
    case Jpeg  = 'jpeg';
    case Png   = 'png';
    case Webp  = 'webp';

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
