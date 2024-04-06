<?php

namespace App\Actions\Services;

use App\Models\Service;
use App\Traits\AsAction;
use Symfony\Component\HttpFoundation\Response;

class DeleteServiceAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(Service $service): bool
    {
        $deleted = DeleteServiceImageAction::run($service);
        if (!$deleted) {
            throw new \Exception(message: 'Something went wrong', code: Response::HTTP_BAD_REQUEST);
        }

        return $service->delete();
    }
}
