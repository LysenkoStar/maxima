<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Images\ProductImageSizes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
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

    /**
     * @param CreateProductFormRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(CreateProductFormRequest $request): RedirectResponse|JsonResponse
    {
        try {
            $product = app(ProductService::class)->createProductFromRequest(request: $request);

            session()->flash(
                key: 'success',
                value: __('dashboard/products/messages.success.create')
            );

            return response()->json([
                'success'   => true,
                'message'   => __('dashboard/products/messages.success.create'),
                'redirect'  => route('dashboard.products'),
                'product'   => new ProductResource($product),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
            ->get()
            ->map(function ($image) {
                $image->url = $image->getThumbnailUrl(ProductImageSizes::small);
                return $image;
            })
            ->sortBy('sort')
            ->values()
            ->toArray();

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
     * @return RedirectResponse|JsonResponse
     */
    public function update(UpdateProductFormRequest $request, Product $product): RedirectResponse|JsonResponse
    {
        try {
            $product = app(ProductService::class)->updateProductFromRequest(request: $request, product: $product);

            session()->flash(
                key: 'success',
                value: __('dashboard/products/messages.success.update')
            );

            return response()->json([
                'success'   => true,
                'message'   => __('dashboard/products/messages.success.update'),
                'redirect'  => route('dashboard.products'),
                'product'   => new ProductResource($product),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Product $product
     * @return RedirectResponse|Redirector
     */
    public function delete(Product $product): RedirectResponse|Redirector
    {
        try {
            app(ProductService::class)->deleteProduct(product: $product);

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
