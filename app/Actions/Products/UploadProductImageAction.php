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

    public function handle(Product $product, UploadedFile $file): ProductImage|Model
    {
        $file_name = $this->storeFileToPublicFolder($file);

        $image = $product->images()->create(attributes: [
            'image' => $file_name,
            'description' => $file->getClientOriginalName(),
            'sort' => 0,
            'status' => 1,
        ]);

        Log::info(
            message: 'Product image uploaded',
            context: ['product' => $product, 'image' => $file_name]
        );

        return $image;
    }


    /**
     * @param UploadedFile $file
     * @return string (file name)
     */
    private function storeFileToPublicFolder(UploadedFile $file): string
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->storePubliclyAs(
            path: 'uploads/products',
            name: $fileName,
            options: 'public'
        );

        return $fileName;
    }
}
