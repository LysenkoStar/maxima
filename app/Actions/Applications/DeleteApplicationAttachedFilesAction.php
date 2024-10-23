<?php

namespace App\Actions\Applications;

use App\Models\Application;
use App\Models\Media;
use App\Traits\AsAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class DeleteApplicationAttachedFilesAction
{
    use AsAction;

    public function handle(Application $application): void
    {
        /** @var Collection $medias **/
        if ($medias = $application->media) {
            $medias->each(function (Media $media) {
                $media->delete();

                Log::info(
                    message: 'Media deleted',
                    context: ['media' => $media]
                );
            });
        }
    }
}
