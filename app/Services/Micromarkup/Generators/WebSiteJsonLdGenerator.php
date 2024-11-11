<?php

namespace App\Services\Micromarkup\Generators;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\BaseJsonLdGenerator;

class WebSiteJsonLdGenerator extends BaseJsonLdGenerator
{
    protected string $type = JsonLdType::WEBSITE->value;
}
