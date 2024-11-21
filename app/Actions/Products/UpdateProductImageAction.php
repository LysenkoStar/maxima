<?php

namespace App\Actions\Products;

use App\Models\ProductImage;
use App\Traits\AsAction;

class UpdateProductImageAction
{
    use AsAction;

    public function handle(array $data): void
    {
        if (isset($data['id'])) {
            $image = ProductImage::find($data['id']);

            $image->update([
                'status' => $data['status'] ?? 1,
                'sort'   => $data['sort'] ?? 0,
            ]);
        }
    }
}
