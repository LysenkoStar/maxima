<?php

namespace App\Services;

use App\Actions\MakeSlugFromStringAction;
use App\Actions\Products\CreateProductAction;
use App\Actions\Products\DeleteProductAction;
use App\Actions\Products\GetRelatedProductsAction;
use App\Actions\Products\UpdateProductAction;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Collection;

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

    public function deleteProduct(Product $product): void
    {
        DeleteProductAction::run($product);
    }

    public function relatedProducts(Product $product): Collection
    {
        return GetRelatedProductsAction::run($product);
    }
}
