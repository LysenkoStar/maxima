<?php

namespace App\Services;

use App\Actions\Applications\CreateApplicationAction;
use App\Actions\Applications\DeleteApplicationAction;
use App\Http\Requests\Application\CreateApplicationFormRequest;
use App\Models\Application;

class ApplicationService
{
    public function createNewRequest(CreateApplicationFormRequest $request): void
    {
        CreateApplicationAction::run(request: $request);
    }

    public function deleteRequest(Application $application): void
    {
        DeleteApplicationAction::run(application: $application);
    }
}
