<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Dashboard product create page
     * @param Request $request
     * @return View
     */
    public function form(Request $request): View
    {
        $categories = ProductCategory::take(100)->get(['id', 'name']);

        return view(
            view: 'admin.products.form',
            data: [
                'action' => route('dashboard.products.store'),
                'categories' => $categories
            ],
        );
    }

    public function store(CreateProductFormRequest $request): RedirectResponse
    {
        try {
            app(ProductService::class)->createProductFromRequest(request: $request);

            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'success',
                    value: __('dashboard/products/messages.success.create')
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'error',
                    value: $e->getMessage()
                );
        }
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $categories = ProductCategory::take(100)->get(['id', 'name']);

        $productImages = $product->images()
            ->get(['id', 'image', 'status', 'sort'])
            ->map(function ($image) {
                $image->url = $image->getImageUrlAttribute();
                return $image;
            })->toArray();

        return view(
            view: 'admin.products.form',
            data: [
                'product'       => $product,
                'productImages' => $productImages,
                'categories'    => $categories,
                'action'        => route(
                    name: 'dashboard.products.update',
                    parameters: ['product' => $product]
                )
            ]
        );
    }

    /**
     * @param UpdateProductFormRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductFormRequest $request, Product $product): RedirectResponse
    {
        try {
            app(ProductService::class)->updateProductFromRequest(request: $request, product: $product);

            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'success',
                    value: __('dashboard/products/messages.success.update'),
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    /**
     * @param ProductCategory $category
     * @return RedirectResponse|Redirector
     */
    public function delete(ProductCategory $category): RedirectResponse|Redirector
    {
        try {
            app(ProductService::class)->deleteProduct(category: $category);

            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'success',
                    value: __('dashboard/products/messages.success.delete'),
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.products')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    public function createProductSlug(Request $request): JsonResponse
    {
        try {
            if (!$request->has('title')) {
                throw new \Exception(__('Undefined title'), Response::HTTP_BAD_REQUEST);
            }

            $slug = app(ProductService::class)->makeProductSlug(string: $request->get('title'));

            return response()->json([
                'error' => false,
                'slug' => $slug
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }
}
