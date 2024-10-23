<?php

namespace App\Actions\Categories;

use App\Models\ProductCategory;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DeleteCategoryImageAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(ProductCategory $category): bool
    {
        if ($category->image) {
            if (Storage::disk('uploads')->exists("images/$category->image")) {
                return Storage::disk('uploads')->delete("images/$category->image");
            } else {
                // todo: check logic
                throw new \Exception(
                    message: __('The category image was not found'),
                    code: Response::HTTP_NOT_FOUND
                );
            }
        }

        return true;
    }
}
