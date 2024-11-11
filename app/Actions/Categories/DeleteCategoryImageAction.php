<?php

namespace App\Actions\Categories;

use App\Models\ProductCategory;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DeleteCategoryImageAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(ProductCategory $category): bool
    {
        if ($category->image) {
            if (Storage::disk('uploads')->exists("categories/$category->image")) {
                return Storage::disk('uploads')->delete("categories/$category->image");
            }

            Log::info(
                message: 'Product category image deleted',
                context: ['category' => $category, 'image' => $category->image]
            );
        }

        return true;
    }
}
