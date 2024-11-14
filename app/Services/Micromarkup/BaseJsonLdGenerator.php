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
        // get default data by generator type and merge with required data
        $default_data = array_merge([
            '@context' => 'https://schema.org',
            '@type' => $this->type,
        ], $this->getDefaultData());

        // combine all the data into a single array
        $this->data = array_merge_recursive_replace($default_data, $data);
    }

    public function addProperty($name, $value): static
    {
        if ($value !== null) {
            $this->data = array_merge_recursive_replace($this->data, [$name => $value]);
        }

        return $this;
    }

    public function addProperties(array $properties): static
    {
        $this->data = array_merge_recursive_replace($this->data, $properties);

        return $this;
    }

    public function getJsonLd(): bool|string
    {
        return json_encode($this->data, JSON_UNESCAPED_SLASHES);
    }

    abstract protected function getDefaultData();
}
