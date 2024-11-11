<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
