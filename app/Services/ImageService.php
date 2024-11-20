<?php

namespace App\Services;

use App\Actions\Image\ConvertToWebPAction;
use App\Actions\Image\GenerateThumbnailsAction;
use App\Actions\Image\OptimizeImageAction;

class ImageService
{
    /**
     * Конвертация изображения в формат WebP
     * Converting an image to WebP format
     *
     * @param string $imagePath
     * @param string $outputPath
     *
     * @return void
     */
    public function convertToWebP(string $imagePath, string $outputPath): void
    {
        ConvertToWebPAction::run(imagePath: $imagePath, outputPath: $outputPath);
    }

    /**
     * Оптимизация изображения для уменьшения размера
     * Optimize image to reduce size
     *
     * @param string $imagePath
     * @param string $outputPath
     *
     * @return void
     */
    public function optimizeImage(string $imagePath, string $outputPath): void
    {
        OptimizeImageAction::run(imagePath: $imagePath, outputPath: $outputPath);
    }

    /**
     * Генерация миниатюр и адаптивных версий
     * Generating thumbnails and adaptive versions
     *
     * @param string $imagePath
     * @param string $outputPath
     *
     * @return void
     */
    public function generateThumbnails(string $imagePath, string $outputPath): void
    {
        GenerateThumbnailsAction::run(imagePath: $imagePath, outputPath: $outputPath);
    }

}
