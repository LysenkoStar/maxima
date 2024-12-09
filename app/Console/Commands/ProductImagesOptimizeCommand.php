<?php

namespace App\Console\Commands;

use App\Actions\Products\OptimizeProductImageAction;
use App\Models\ProductImage;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ProductImagesOptimizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:product-images-optimize-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize product images and change directory';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            ProductImage::chunk(200, function (Collection $images) {
                /** @var $image ProductImage **/
                foreach ($images as $image) {
                    $path = "products/{$image->product_id}/{$image->id}";
                    $filename = $image->image;

                    $exist = $this->checkExists($path, $filename);

                    if (!$exist) {
                        $this->moveImageToFolder($image, $path);
                        $this->optimizeImage($image);
                    }
                }
            });
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function checkExists(string $path, string $filename): bool
    {
        if (
            !Storage::disk('uploads')->exists($path) ||
            Storage::disk('uploads')->files($path) == null ||
            !Storage::disk('uploads')->exists($path . "/$filename")
        ) {
            $this->info("Image $path does not exist");

            return false;
        }

        return true;
    }

    private function moveImageToFolder(ProductImage $image, string $path): void
    {
        Storage::disk('uploads')->makeDirectory($path);

        Storage::disk('uploads')->move(from: "products/{$image->image}", to: "{$path}/{$image->image}");

        $this->info("Image moved to {$path}/{$image->image}");
    }

    private function optimizeImage(ProductImage $image): void
    {
        OptimizeProductImageAction::run($image);

        $this->info("Image is optimized to {$image->image}");
    }
}
