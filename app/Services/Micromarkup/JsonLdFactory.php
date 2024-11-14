<?php

namespace App\Services\Micromarkup;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\Generators\OrganizationJsonLdGenerator;
use App\Services\Micromarkup\Generators\WebSiteJsonLdGenerator;

class JsonLdFactory
{
    public static function create(JsonLdType $type): BaseJsonLdGenerator
    {
        return match ($type->value) {
            JsonLdType::ORGANIZATION->value => new OrganizationJsonLdGenerator(),
            JsonLdType::WEBSITE->value      => new WebSiteJsonLdGenerator(),
            JsonLdType::PRODUCT->value      => new ProductJsonLdGenerator(),
            JsonLdType::PRODUCT->value      => new ProductJsonLdGenerator(),
            default => throw new \InvalidArgumentException("Unknown type of Json Ld: {$type->value}"),
        };
    }
}
