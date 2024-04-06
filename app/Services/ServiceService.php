<?php

namespace App\Services;

use App\Actions\MakeSlugFromStringAction;
use App\Actions\Services\CreateServiceAction;
use App\Actions\Services\DeleteServiceAction;
use App\Actions\Services\UpdateServiceAction;
use App\Http\Requests\Service\CreateServiceFormRequest;
use App\Http\Requests\Service\UpdateServiceFormRequest;
use App\Models\Service;

class ServiceService
{
    public function makeServiceSlug(string $string): string
    {
        return MakeSlugFromStringAction::run($string);
    }

    public function createServiceFromRequest(CreateServiceFormRequest $request): Service
    {
        return CreateServiceAction::run(request: $request);
    }

    public function updateServiceFromRequest(UpdateServiceFormRequest $request, Service $service): Service
    {
        return UpdateServiceAction::run(request: $request, service: $service);
    }

    public function deleteService(Service $service): bool
    {
        return DeleteServiceAction::run(service: $service);
    }
}
