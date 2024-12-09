<?php

namespace App\Actions\Products;

use App\Models\ProductImage;
use App\Traits\AsAction;
use Exception;
use Illuminate\Http\UploadedFile;

class SaveImageToDiskAction
{
    use AsAction;

    /**
     * @throws Exception
     */
    public function handle(UploadedFile $file, ProductImage $image): void
    {
        $saved = $file->storePubliclyAs(
            path: "uploads/products/{$image->product_id}/{$image->id}",
            name: $image->image,
            options: 'public'
        );

        if (!$saved) {
            throw new Exception(message: 'Unable to store image');
        }
    }
}
