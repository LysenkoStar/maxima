<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    /**
     * Fields containing translation Spatie (field must be as json/text type)
     *
     * @var array
     */
    public array $translatable = ['name', 'description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'product_category_id',
        'status',
        'slug',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
