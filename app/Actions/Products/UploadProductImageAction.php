<?php

namespace App\Actions\Products;

use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\AsAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UploadProductImageAction
{
    use AsAction;

    /**
     * @param Product $product
     * @param UploadedFile $file
     * @param array $img_data
     * @return ProductImage|Model
     */
    public function handle(
        Product $product,
        UploadedFile $file,
        array $img_data = []
    ): ProductImage|Model  {
        // Generate new file name
        $file_name = $this->generateFileName($file);

        // Save image metadata in the database
        $image = $product->images()->create(attributes: [
            'image'         => $file_name,
            'original_name' => $file->getClientOriginalName(),
            'description'   => $file->getClientOriginalName(),
            'mime_type'     => $file->getClientMimeType(),
            'sort'          => $img_data['sort'] ?? 0,
            'status'        => $img_data['status'] ?? 1,
        ]);

        // Store file
        SaveImageToDiskAction::run($file, $image);

        // Optimize the image
        OptimizeProductImageAction::run($image);

        // Log the upload
        Log::info(
            message: 'Product image uploaded',
            context: ['product' => $product, 'image' => $file_name]
        );

        return $image;
    }

    private function generateFileName(UploadedFile $file): string
    {
        return Str::uuid() . '.' . $file->getClientOriginalExtension();
    }
}
