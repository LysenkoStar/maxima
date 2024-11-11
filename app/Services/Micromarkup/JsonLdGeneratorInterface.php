<?php

namespace App\Services\Micromarkup;

interface JsonLdGeneratorInterface
{
    function addProperty($name, $value): static;
    function addProperties(array $properties): static;
    function getJsonLd(): bool|string;
}
