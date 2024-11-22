<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'image_url'     => $this->getImageUrl(),
            'status'        => $this->status,
            'slug'          => $this->slug,
        ];
    }
}
