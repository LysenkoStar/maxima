<?php

namespace App\Actions\Products;

use App\Models\Product;
use App\Traits\AsAction;
use Illuminate\Support\Collection;

class GetRelatedProductsAction
{
    use AsAction;

    public function handle(Product $product, int $max = 5): Collection
    {
        return Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->limit($max)
            ->get();
    }
}
