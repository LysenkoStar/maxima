<?php

namespace App\Actions\Image;

use App\Traits\AsAction;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ConvertToWebPAction
{
    use AsAction;

    public function handle(string $imagePath, string $outputPath): void
    {
        $webpPath = $outputPath . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';

        Image::load($imagePath)
            ->format(Manipulations::FORMAT_WEBP)
            ->save(Storage::path($webpPath));
    }
}
