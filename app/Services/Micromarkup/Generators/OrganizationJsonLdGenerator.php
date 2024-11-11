<?php

namespace App\Services\Micromarkup\Generators;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\BaseJsonLdGenerator;

class OrganizationJsonLdGenerator extends BaseJsonLdGenerator
{
    protected string $type = JsonLdType::ORGANIZATION->value;
}
