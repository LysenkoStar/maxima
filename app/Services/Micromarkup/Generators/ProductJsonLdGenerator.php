<?php

namespace App\Services\Micromarkup\Generators;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\BaseJsonLdGenerator;
use Illuminate\Support\Facades\Config;

class ProductJsonLdGenerator extends BaseJsonLdGenerator
{
    protected string $type = JsonLdType::PRODUCT->value;

    protected function getDefaultData(): array
    {
        // todo: write all options from https://schema.org/Product
        return [
            'name' => '',
            'url' => '',
            'description' => '',
        ];
    }
}
