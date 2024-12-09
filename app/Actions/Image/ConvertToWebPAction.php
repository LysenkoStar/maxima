<?php

namespace App\Actions\Image;

use App\Enums\Images\ProductImageFormats;
use App\Traits\AsAction;
use Spatie\Image\Exceptions\CouldNotLoadImage;
use Spatie\Image\Image;

class ConvertToWebPAction
{
    use AsAction;

    /**
     * @throws CouldNotLoadImage
     */
    public function handle(string $imagePath, string $outputPath): void
    {
        $webpPath = $outputPath . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';

        Image::load($imagePath)
            ->format(ProductImageFormats::Webp->value)
            ->save($webpPath);
    }
}
