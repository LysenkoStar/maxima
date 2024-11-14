<?php

namespace App\Services;

use App\Actions\MakeSlugFromStringAction;
use App\Actions\Products\CreateProductAction;
use App\Actions\Products\UpdateProductAction;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;
use App\Models\Product;

class ProductService
{
    public function makeProductSlug(string $string): string
    {
        return MakeSlugFromStringAction::run($string);
    }

    public function createProductFromRequest(CreateProductFormRequest $request): Product
    {
        return CreateProductAction::run(request: $request);
    }

    public function updateProductFromRequest(UpdateProductFormRequest $request, Product $product): Product
    {
        return UpdateProductAction::run(request: $request, product: $product);
    }
}
