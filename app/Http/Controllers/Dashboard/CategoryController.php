<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryFormRequest;
use App\Http\Requests\Category\UpdateCategoryFormRequest;
use App\Http\Requests\Service\UpdateServiceFormRequest;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Services\CategoryService;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function form(Request $request): View
    {
        return view(
            view: 'admin.categories.form',
            data: ['action' => route('dashboard.category.store')],
        );
    }

    public function store(CreateCategoryFormRequest $request): RedirectResponse
    {
        try {
            app(CategoryService::class)->createCategoryFromRequest(request: $request);

            return redirect()
                ->route('dashboard.categories')
                ->with(
                    key: 'success',
                    value: __('dashboard/services/messages.success.create')
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.categories')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    /**
     * @param ProductCategory $category
     * @return View
     */
    public function edit(ProductCategory $category): View
    {
        return view(
            view: 'admin.categories.form',
            data: [
                'category' => $category,
                'action' => route(
                    name: 'dashboard.category.update',
                    parameters: ['category' => $category]
                )
            ]
        );
    }

    /**
     * @param UpdateCategoryFormRequest $request
     * @param ProductCategory $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryFormRequest $request, ProductCategory $category): RedirectResponse
    {
        try {
            app(CategoryService::class)->updateCategoryFromRequest(request: $request, category: $category);

            return redirect()
                ->route('dashboard.categories')
                ->with(
                    key: 'success',
                    value: __('dashboard/services/messages.success.update'),
                );
        } catch (\Exception $e) {
            return redirect()->route('dashboard.categories')
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
            app(CategoryService::class)->deleteCategory(category: $category);

            return redirect()
                ->route('dashboard.categories')
                ->with(
                    key: 'success',
                    value: __('dashboard/services/messages.success.delete'),
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.categories')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    public function createServiceSlug(Request $request): JsonResponse
    {
        try {
            if (!$request->has('title')) {
                throw new \Exception(__('Undefined title'), Response::HTTP_BAD_REQUEST);
            }

            $slug = app(CategoryService::class)->makeCategorySlug(string: $request->get('title'));

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
