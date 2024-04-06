<?php

namespace App\Actions\Services;

use App\Models\Service;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DeleteServiceImageAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(Service $service): bool
    {
        if ($service->image) {
            if (Storage::disk('uploads')->exists("images/$service->image")) {
                return Storage::disk('uploads')->delete("images/$service->image");
            } else {
                throw new \Exception(
                    message: __('The service image was not found'),
                    code: Response::HTTP_NOT_FOUND
                );
            }
        }

       return true;
    }
}
