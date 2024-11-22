<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function products(): View
    {
        // todo: add route for products without categories
        $products = Product::active()->paginate(6);

        return view(
            view: 'products.index',
            data: ['products' => $products]
        );
    }

    /**
     * @param ProductCategory $category
     * @return View|RedirectResponse
     */
    public function productsByCategory(ProductCategory $category): View|RedirectResponse
    {
        try {
            $products = $category->products()
                ->active()
                ->paginate(5);

            return view(
                view: 'pages/products/list',
                data: [
                    'category' => $category,
                    'products' => $products
                ]
            );
        } catch (Exception $e) {
            return redirect()
                ->route('page.products')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    public function productItem(Product $product): View|RedirectResponse
    {
        try {
            $relatedProducts = app(ProductService::class)->relatedProducts(product: $product);

            $productImages = $product->images()->orderBy('sort')->get();

            return view(
                view: 'pages/products/product',
                data: [
                    'product' => $product,
                    'relatedProducts' => $relatedProducts,
                    'productImages' => $productImages,
                ]
            );
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }
}
