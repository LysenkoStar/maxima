<?php

namespace App\Actions\Products;

use App\Models\ProductImage;
use App\Services\ImageService;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Storage;

class OptimizeProductImageAction
{
    use AsAction;

    /**
     * @param ImageService $imageService
     */
    public function __construct(public readonly ImageService $imageService)
    {
    }

    public function handle(ProductImage $image): void
    {
        $image_path = Storage::disk('uploads')->path("products/{$image->product_id}/{$image->id}/{$image->image}");
        $optimized_path = Storage::disk('uploads')->path("products/{$image->product_id}/{$image->id}/");

        $this->imageService->convertToWebP($image_path, $optimized_path);
        $this->imageService->optimizeImage($image_path, $optimized_path);
        $this->imageService->generateThumbnails($image_path, $optimized_path);
    }
}
