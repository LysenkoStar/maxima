<?php

namespace App\Services;

use App\Services\Micromarkup\JsonLdFactory;
use Exception;
use JetBrains\PhpStorm\NoReturn;

class MicromarkupService
{
    /**
     * @param string $type
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function generateJsonLd(string $type, array $data): string
    {
        $generator = JsonLdFactory::create($type);
        $json_ld = $generator->addProperties($data)->getJsonLd();

        if (is_bool($json_ld)) {
            throw new Exception('Micromarkup returned error while generating json ld');
        }

        return $json_ld;
    }
}
