<?php

namespace App\Listeners\Product;

use App\Events\Product\DeletedEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

final readonly class DeleteImages
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(DeletedEvent $event): void
    {
        if ($event->product->isExistImageFolder()) {
            Storage::disk('uploads')->deleteDirectory($event->product->getImageDirectoryPath());

            Log::warning(
                message: 'Product images folder was deleted.',
                context: ['product' => $event->product]
            );
        }
    }
}
