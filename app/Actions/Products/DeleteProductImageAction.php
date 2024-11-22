<?php

namespace App\Actions\Products;

use App\Models\ProductImage;
use App\Traits\AsAction;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DeleteProductImageAction
{
    use AsAction;

    public function handle(ProductImage $productImage): void
    {
        DB::beginTransaction();

        try {
            if ($productImage->isExistInFolder()) {
                Storage::disk('uploads')->delete("products/$productImage->image");
            }

            $productImage->delete();

            DB::commit();

            Log::info(
                message: 'Product image deleted',
                context: ['id' => $productImage->id, 'image' => $productImage->image]
            );
        } catch (Exception $e) {
            DB::rollBack();

            Log::error(
                message: $e->getMessage(),
                context: [
                    'id'        => $productImage->id,
                    'message'   => 'An error occurred while deleting the product image.',
                ]
            );
        }

    }
}
