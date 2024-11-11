<?php

namespace App\Services\Micromarkup;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\Generators\OrganizationJsonLdGenerator;
use App\Services\Micromarkup\Generators\WebSiteJsonLdGenerator;

class JsonLdFactory
{
    public static function create(string $type): BaseJsonLdGenerator
    {
        return match ($type) {
            JsonLdType::ORGANIZATION->value => new OrganizationJsonLdGenerator(),
            JsonLdType::WEBSITE->value      => new WebSiteJsonLdGenerator(),
            default => throw new \InvalidArgumentException("Unknown type: {$type}"),
        };
    }
}
