<?php

namespace App\Actions\Image;

use App\Traits\AsAction;
use Spatie\Image\Exceptions\CouldNotLoadImage;
use Spatie\Image\Image;

class OptimizeImageAction
{
    use AsAction;

    /**
     * @throws CouldNotLoadImage
     */
    public function handle(string $imagePath, string $outputPath): void
    {
        $path = $outputPath . basename($imagePath);

        Image::load($imagePath)
            ->optimize()
            ->save($path);
    }
}
