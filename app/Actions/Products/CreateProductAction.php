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
                'full_info'             => $request->input('full_info'),
                'slug'                  => $request->input('slug'),
                'price'                 => $request->input('price'),
                'show_price'            => $request->input('show_price'),
                'product_category_id'   => $request->input('product_category_id'),
                'status'                => $request->input('status'),
            ]);

            Log::info(
                message: 'New product created.',
                context: ['product' => $product]
            );


            if ($request->has('images')) {
                $images_data = $request->get('images');

                foreach ($images_data as $data) {
                    UploadProductImageAction::run(
                        product: $product,
                        file: $data['file'],
                        img_data: $data
                    );
                }
            }

            return $product;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw new \Exception('There was an error while creating the product.');
        }
    }
}
