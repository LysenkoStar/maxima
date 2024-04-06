<?php

namespace App\Actions\Categories;

use App\Http\Requests\Category\UpdateCategoryFormRequest;
use App\Models\ProductCategory;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;

class UpdateCategoryAction
{
    use AsAction;

    /**
     * @param UpdateCategoryFormRequest $request
     * @param ProductCategory $category
     * @return ProductCategory
     */
    public function handle(UpdateCategoryFormRequest $request, ProductCategory $category): ProductCategory
    {
        $form = $request->only(
            'name',
            'description',
            'slug',
            'status'
        );

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            DeleteCategoryImageAction::run($category);

            /** @var UploadedFile $image **/
            $image = $request->file('image');
            $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

            $form['image'] = $imageName;
        }

        $category->fill($form)->save();

        return $category;
    }
}
