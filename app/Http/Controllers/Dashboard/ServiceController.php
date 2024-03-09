<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceFormRequest;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
            $form = $request->only(
                'title',
                'description',
                'short_description',
                'text',
                'slug',
                'status'
            );

            if ($request->hasFile('image')) {
                /** @var UploadedFile $image **/
                $image = $request->file('image');
                $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

                $form['image'] = $imageName;
            }

            Service::create($form);

            return redirect()
                ->route('dashboard.services')
                ->with([
                    'alert-message' => __('dashboard/services/messages.success.create'),
                    'alert-type' => 'success',
                ]);
        } catch (\Exception $e) {

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
     * @param CreateServiceFormRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(CreateServiceFormRequest $request, Service $service): RedirectResponse
    {
        $form = $request->only(
            'title',
            'description',
            'short_description',
            'text',
            'slug',
            'status'
        );

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($service->image && Storage::disk('uploads')->exists("images/$service->image")) {
                Storage::disk('uploads')->delete("images/$service->image");
            }

            /** @var UploadedFile $image **/
            $image = $request->file('image');
            $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

            $imgUrl = Storage::url($imageName);
            $form['image'] = $imageName;
        }

        $service->fill($form);

        return redirect()
            ->route('dashboard.services')
            ->with([
                'alert-message' => __('dashboard/services/messages.success.update'),
                'alert-type' => 'success',
            ]);
    }

    /**
     * @param Service $service
     * @return RedirectResponse|Redirector
     */
    public function delete(Service $service): RedirectResponse|Redirector
    {
        try {
            $service->delete();

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

            $slug = Str::slug($request->get('title'), '-');

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
