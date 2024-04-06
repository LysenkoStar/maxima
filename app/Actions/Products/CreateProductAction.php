<?php

namespace App\Actions\Products;

use App\Http\Requests\Product\CreateProductFormRequest;
use App\Models\Product;
use App\Traits\AsAction;

class CreateProductAction
{
    use AsAction;

    /**
     * @param CreateProductFormRequest $request
     * @return Product
     */
    public function handle(CreateProductFormRequest $request): Product
    {

    }
}
