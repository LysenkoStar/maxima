<?php

namespace App\Actions\Services;

use App\Http\Requests\Service\UpdateServiceFormRequest;
use App\Models\Service;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateServiceAction
{
    use AsAction;

    /**
     * @param UpdateServiceFormRequest $request
     * @param Service $service
     * @return Service
     */
    public function handle(UpdateServiceFormRequest $request, Service $service): Service
    {
        $form = $request->only(
            'title',
            'description',
            'short_description',
            'text',
            'slug',
            'status'
        );

        // handle checkbox fields
        $form['products_link'] = (bool)$request->input('products_link', false);
        $form['applications_link'] = (bool)$request->input('applications_link', false);

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            DeleteServiceImageAction::run($service);

            /** @var UploadedFile $image **/
            $image = $request->file('image');
            $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

            $form['image'] = $imageName;
        }

        $service->fill($form)->save();

        return $service;
    }
}
