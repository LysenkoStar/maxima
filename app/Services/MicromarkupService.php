<?php

namespace App\Services;

use App\Actions\Micromarkup\GenerateJsonLdByType;
use App\Enums\Micromarkup\JsonLdType;
use Exception;

class MicromarkupService
{
    /**
     * @param JsonLdType $type
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function generateJsonLdByType(JsonLdType $type, array $data = []): string
    {
        return GenerateJsonLdByType::run(type: $type, extended_data: $data);
    }
}
