<?php

namespace App\Actions\Image;

use App\Traits\AsAction;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;

class OptimizeImageAction
{
    use AsAction;

    public function handle(string $imagePath, string $outputPath): void
    {
        Image::load($imagePath)
            ->optimize()
            ->save(Storage::path($outputPath . basename($imagePath)));
    }
}
