<?php

namespace App\Services\Micromarkup\Generators;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\BaseJsonLdGenerator;

class OrganizationJsonLdGenerator extends BaseJsonLdGenerator
{
    protected string $type = JsonLdType::ORGANIZATION->value;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    protected function getDefaultData(): array
    {
        return [
            'url' => url('/'),
            'name' => 'Maxima',
            'email' => 'npomaxima@gmail.com',
            'contactPoint' => [
                "@type" => JsonLdType::CONTACTPOINT->value,
                "telephone" => "+38 (095) 225 25 35",
                "areaServed" => "UA",
                "contactType" => "customer service"
            ],
            'address' => [
                "@type" => JsonLdType::POSTALADDRESS->value,
                "streetAddress" => "ул.Вишневая, 27",
                "addressLocality" => "Харьков",
                "addressRegion" => "Харьковская область",
                "addressCountry" => [
                    "@type" => "Country",
                    "name" => "Украина"
                ]
            ]
        ];
    }
}
