<?php

namespace App\Actions\Image;

use App\Traits\AsAction;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class GenerateThumbnailsAction
{
    use AsAction;

    public function handle(string $imagePath, string $outputPath): void
    {
        $sizes = [
            'small'     => 200,
            'medium'    => 500,
            'large'     => 1000,
        ];

        foreach ($sizes as $size => $width) {
            $thumbnailPath = $outputPath . "{$size}_" . basename($imagePath);

            $image = InterventionImage::make($imagePath)
                ->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            $image->save(Storage::path($thumbnailPath));
        }
    }
}
