<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\CreateServiceFormRequest;
use App\Http\Requests\Service\UpdateServiceFormRequest;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function form(Request $request): View
    {
        return view(
            view: 'admin.services.create',
            data: ['action' => route('dashboard.services.store')],
        );
    }

    public function store(CreateServiceFormRequest $request): RedirectResponse
    {
        try {
            app(ServiceService::class)->createServiceFromRequest(request: $request);

            return redirect()
                ->route('dashboard.services')
                ->with([
                    'alert-message' => __('dashboard/services/messages.success.create'),
                    'alert-type' => 'success',
                ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.services')
                ->with([
                    'alert-message' => $e->getMessage(),
                    'alert-type' => 'error',
                ]);
        }
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        return view(
            view: 'admin.services.create',
            data: [
                'service' => $service,
                'action' => route(
                    name: 'dashboard.services.update',
                    parameters: ['service' => $service]
                )
            ]
        );
    }

    /**
     * @param UpdateServiceFormRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(UpdateServiceFormRequest $request, Service $service): RedirectResponse
    {
        try {
            app(ServiceService::class)->updateServiceFromRequest(request: $request, service: $service);

            return redirect()
                ->route('dashboard.services')
                ->with([
                    'alert-message' => __('dashboard/services/messages.success.update'),
                    'alert-type' => 'success',
                ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.services')
                ->with([
                    'alert-message' => $e->getMessage(),
                    'alert-type' => 'error',
                ]);
        }
    }

    /**
     * @param Service $service
     * @return RedirectResponse|Redirector
     */
    public function delete(Service $service): RedirectResponse|Redirector
    {
        try {
            app(ServiceService::class)->deleteService(service: $service);

            return redirect()
                ->route('dashboard.services')
                ->with([
                    'alert-message' => __('dashboard/services/messages.success.delete'),
                    'alert-type' => 'success',
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.services')
                ->with([
                    'alert-message' => $e->getMessage(),
                    'alert-type' => 'error',
                ]);
        }
    }

    public function createServiceSlug(Request $request): JsonResponse
    {
        try {
            if (!$request->has('title')) {
               throw new \Exception(__('Undefined title'), Response::HTTP_BAD_REQUEST);
            }

            $slug = app(ServiceService::class)->makeServiceSlug(string: $request->get('title'));

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
