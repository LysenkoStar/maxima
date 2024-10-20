<?php

namespace App\Services;

use App\Actions\Applications\CreateApplicationAction;
use App\Http\Requests\Application\CreateApplicationFormRequest;

class ApplicationService
{
    public function createNewRequest(CreateApplicationFormRequest $request)
    {
        return CreateApplicationAction::run(request: $request);
    }
}
