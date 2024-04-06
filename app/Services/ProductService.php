<?php

namespace App\Services;

use App\Actions\MakeSlugFromStringAction;
use App\Actions\Products\CreateProductAction;
use App\Http\Requests\Product\CreateProductFormRequest;
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
}
