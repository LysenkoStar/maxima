<?php

namespace App\Actions\Products;

use App\Http\Requests\Product\CreateProductFormRequest;
use App\Models\Product;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CreateProductAction
{
    use AsAction;

    /**
     * @param CreateProductFormRequest $request
     * @return Product
     * @throws \Exception
     */
    public function handle(CreateProductFormRequest $request): Product
    {
        try {
            $product = Product::create([
                'name'                  => $request->input('name'),
                'description'           => $request->input('description'),
                'slug'                  => $request->input('slug'),
                'product_category_id'   => $request->input('product_category_id'),
                'status'                => $request->input('status'),
            ]);

            Log::info(
                message: 'New product created.',
                context: ['product' => $product]
            );

            if ($request->hasFile('images')) {
                /** @var UploadedFile $file **/
                foreach ($request->file('images') as $file) {
                    UploadProductImageAction::run(product: $product, file: $file);
                }
            }

            return $product;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw new \Exception('There was an error while creating the product.');
        }
    }
}
