<?php

namespace App\Actions\Micromarkup;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\JsonLdFactory;
use App\Traits\AsAction;
use Exception;

class GenerateJsonLdByType
{
    use AsAction;

    /**
     * @param JsonLdType $type
     * @param array $extended_data
     * @return string
     * @throws Exception
     */
    public function handle(JsonLdType $type, array $extended_data = []): string
    {
        $generator = JsonLdFactory::create($type);

        if (!empty($extended_data)) {
            $generator->addProperties($extended_data);
        }

        $json_ld = $generator->getJsonLd();

        if (is_bool($json_ld)) {
            throw new Exception(message: 'Micromarkup returned error while generating json ld');
        }

        return $json_ld;
    }
}
