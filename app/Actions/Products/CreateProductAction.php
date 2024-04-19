<?php

namespace App\Actions\Products;

use App\Http\Requests\Product\CreateProductFormRequest;
use App\Models\Product;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;

class CreateProductAction
{
    use AsAction;

    /**
     * @param CreateProductFormRequest $request
     * @return Product
     */
    public function handle(CreateProductFormRequest $request): Product
    {
        $form = $request->only(
            'name',
            'description',
            'slug',
            'status',
        );

        $product = Product::create($form);

        if ($request->has('images')) {
            /** @var UploadedFile $image **/
            foreach ($request->file('images') as $image) {
                $imageName = 'product_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

                $product->images()->create([
                    'image'       => $imageName,
                    'description' => $image->getClientOriginalName(),
                    'sort'        => 0,
                    'status'      => 1
                ]);
            }
        }

        return $product;
    }
}
