<?php

namespace App\Actions\Applications;

use App\Models\Application;
use App\Traits\AsAction;
use Illuminate\Support\Facades\Log;

class DeleteApplicationAction
{
    use AsAction;

    /**
     * @param Application $application
     * @return void
     */
    public function handle(Application $application): void
    {
        DeleteApplicationAttachedFilesAction::run($application);

        $application->delete();

        Log::info(
            message: 'Application deleted',
            context: ['application' => $application]
        );
    }
}
