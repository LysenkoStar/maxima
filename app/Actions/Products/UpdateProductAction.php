<?php

namespace App\Actions\Products;

use App\Http\Requests\Product\UpdateProductFormRequest;
use App\Models\Product;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Log;

class UpdateProductAction
{
    use AsAction;

    /**
     * @param UpdateProductFormRequest $request
     * @param Product $product
     * @return Product
     */
    public function handle(UpdateProductFormRequest $request, Product $product): Product
    {
        $product->fill($request->validated());

        Log::info(
            message: 'Product updated.',
            context: ['product' => $product]
        );

        if ($request->hasFile('images')) {
            // todo: update images (delete, change order, etc)
        }

        return $product;
    }
}
