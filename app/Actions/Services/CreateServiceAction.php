<?php

namespace App\Actions\Services;

use App\Http\Requests\Service\CreateServiceFormRequest;
use App\Models\Service;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;

class CreateServiceAction
{
    use AsAction;

    /**
     * @param CreateServiceFormRequest $request
     * @return Service
     */
    public function handle(CreateServiceFormRequest $request): Service
    {
        $form = $request->only(
            'title',
            'description',
            'short_description',
            'text',
            'slug',
            'status',
            'products_link',
            'applications_link'
        );

        // handle checkbox fields
        $form['products_link'] = (bool)$request->input('products_link', false);
        $form['applications_link'] = (bool)$request->input('applications_link', false);

        if ($request->hasFile('image')) {
            /** @var UploadedFile $image **/
            $image = $request->file('image');
            $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs(path: 'uploads/images', name: $imageName, options: 'public');

            $form['image'] = $imageName;
        }

        return Service::create($form);
    }
}
