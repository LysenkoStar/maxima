<?php

namespace App\Services;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\DeleteCategoryAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Actions\MakeSlugFromStringAction;
use App\Http\Requests\Category\CreateCategoryFormRequest;
use App\Http\Requests\Category\UpdateCategoryFormRequest;
use App\Models\ProductCategory;

class CategoryService
{
    public function makeCategorySlug(string $string): string
    {
        return MakeSlugFromStringAction::run($string);
    }

    public function createCategoryFromRequest(CreateCategoryFormRequest $request)
    {
        return CreateCategoryAction::run(request: $request);
    }

    public function updateCategoryFromRequest(UpdateCategoryFormRequest $request, ProductCategory $category): ProductCategory
    {
        return UpdateCategoryAction::run(request: $request, category: $category);
    }

    public function deleteCategory(ProductCategory $category): bool
    {
        return DeleteCategoryAction::run(category: $category);
    }
}
