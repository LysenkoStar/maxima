<?php

namespace App\Actions\Products;

use App\Models\Product;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Log;

class DeleteProductAction
{
    use AsAction;

    public function handle(Product $product): void
    {
        if (!$product->trashed()) {
            if ($product->images->exists()) {
                $product->images->each(function ($image) {
                   DeleteProductImageAction::run(productImage: $image);
                });
            }

            $product->delete();

            Log::info(
                message: 'Product deleted successfully.',
                context: ['product' => $product]
            );
        }
    }
}
