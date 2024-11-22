<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property string $description
 * @property int $sort
 * @property bool $status
 */
class ProductImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_product_images';

    protected $fillable = ['product_id', 'image', 'description', 'sort', 'status'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('uploads')->url("products/$this->image");
    }

    public function getImageAltAttribute(): string
    {
        return $this->description;
    }

    public function isExistInFolder(): bool
    {
        return Storage::disk('uploads')->exists("products/$this->image");
    }
}
