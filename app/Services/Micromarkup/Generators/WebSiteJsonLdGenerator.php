<?php

namespace App\Services\Micromarkup\Generators;

use App\Enums\Micromarkup\JsonLdType;
use App\Services\Micromarkup\BaseJsonLdGenerator;
use Illuminate\Support\Facades\Config;

class WebSiteJsonLdGenerator extends BaseJsonLdGenerator
{
    protected string $type = JsonLdType::WEBSITE->value;

    protected function getDefaultData(): array
    {
       return [
           'url' => url('/'),
           'name' => 'Maxima',
           'potentialAction' => [
               "@type" => JsonLdType::SEARCHACTION->value,
               "telephone" => "+38 (095) 225 25 35",
               "target" => "https://liteyka.net/site_search?search_term={search_term}", // todo: change search
               "query-input" => "required name=search_term"
           ],
           "alternateName" => rtrim(preg_replace('#^https?://#', '', Config::get('app.url')), '/')
       ];
    }
}
