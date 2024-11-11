<?php

namespace App\Services\Micromarkup;

abstract class BaseJsonLdGenerator implements JsonLdGeneratorInterface
{
    /**
     * @var string
     */
    protected string $type;

    /**
     * @var array
     */
    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = array_merge([
            '@context' => 'https://schema.org',
            '@type' => $this->type
        ], $data);
    }

    public function addProperty($name, $value): static
    {
        if ($value !== null) {
            $this->data[$name] = $value;
        }

        return $this;
    }

    public function addProperties(array $properties): static
    {
        foreach ($properties as $name => $value) {
            $this->addProperty($name, $value);
        }

        return $this;
    }

    public function getJsonLd(): bool|string
    {
        return json_encode($this->data, JSON_UNESCAPED_SLASHES);
    }
}
