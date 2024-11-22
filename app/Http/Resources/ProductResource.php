<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'status'        => $this->status,
            'slug'          => $this->slug,
            'category'      => $this->category ? new ProductCategoryResource($this->category) : null,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
