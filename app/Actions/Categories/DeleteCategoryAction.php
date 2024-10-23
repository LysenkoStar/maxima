<?php

namespace App\Actions\Categories;

use App\Models\ProductCategory;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DeleteCategoryAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(ProductCategory $category): bool
    {
        $deleted = DeleteCategoryImageAction::run($category);
        if (!$deleted) {
            Log::error("Failed to delete category image.");

            throw new \Exception(message: 'Something went wrong', code: Response::HTTP_BAD_REQUEST);
        }

        return $category->delete();
    }
}
