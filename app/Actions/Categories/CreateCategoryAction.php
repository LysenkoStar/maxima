<?php

namespace App\Actions\Categories;

use App\Http\Requests\Category\CreateCategoryFormRequest;
use App\Models\ProductCategory;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;

class CreateCategoryAction
{
    use AsAction;

    /**
     * @param CreateCategoryFormRequest $request
     * @return ProductCategory
     */
    public function handle(CreateCategoryFormRequest $request): ProductCategory
    {
        $form = $request->only(
            'name',
            'description',
            'slug',
            'status',
        );

        if ($request->hasFile('image')) {
            /** @var UploadedFile $image **/
            $image = $request->file('image');
            $imageName = 'category_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

            $form['image'] = $imageName;
        }

        return ProductCategory::create($form);
    }
}
