<?php

namespace App\Actions\Image;

use App\Enums\Images\ProductImageFormats;
use App\Enums\Images\ProductImageSizes;
use App\Traits\AsAction;
use Spatie\Image\Exceptions\CouldNotLoadImage;
use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;

class GenerateThumbnailsAction
{
    use AsAction;

    /**
     * @throws CouldNotLoadImage
     */
    public function handle(string $imagePath, string $outputPath): void
    {
        foreach (ProductImageSizes::asArray() as $size => $width) {
            $thumbnailPath = $outputPath . "{$size}_" . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';

            Image::load($imagePath)
                ->fit(Fit::Contain, $width, $width)
                ->format(ProductImageFormats::Webp->value)
                ->save($thumbnailPath);
        }
    }
}
