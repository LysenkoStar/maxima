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
        try {
            $valid_data = collect($request->validated());

            $product_data = $valid_data->only([
                'name',
                'description',
                'product_category_id',
                'status',
                'slug'
            ])->toArray();

            $product->fill($product_data)->save();

            Log::info(
                message: 'Product updated.',
                context: ['product' => $product]
            );

            if ($request->has('images')) {
                $images_data = $request->get('images');

                foreach ($images_data as $data) {
                    if (isset($data['id'])) {
                        UpdateProductImageAction::run($data);
                    } elseif (isset($data['file'])) {
                        UploadProductImageAction::run(product: $product, file: $data['file'], img_data: $data);
                    }
                }
            }

            return $product;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw new \Exception('There was an error while updating the product.');
        }
    }
}
