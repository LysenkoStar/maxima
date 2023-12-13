<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function products(): View
    {
        $products = Product::get();

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
            $products = $category->products;

            return view(
                view: 'pages/products/list',
                data: [
                    'category' => $category,
                    'products' => $products
                ]
            );
        } catch (Exception $e) {
            return redirect()->route('page.products')->with('alert', $e->getMessage());
        }

    }
}
