<?php

namespace App\Events\Product;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

final class DeletedEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Product $product)
    {
        Log::info(
            message: 'Start handling the product model deletion event.',
            context: ['product' => $product]
        );
    }
}
