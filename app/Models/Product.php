<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property int product_category_id
 * @property bool $status
 */
class Product extends Model
{
    use HasTranslations, SoftDeletes;

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
        'product_category_id',
        'status',
        'slug',
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Scopes
    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }

    // Methods
    public function getMainImage(): Model|ProductImage|null
    {
        return $this->images()->where('sort', 0)->first();
    }

    public function getMainImageUrl(): string
    {
        $mainImage = $this->getMainImage();

        if ($mainImage && Storage::disk('uploads')->exists("products/$mainImage->image")) {
            return Storage::disk('uploads')->url("products/$mainImage->image");
        }

        return $this::getDefaultImageUrl();
    }

    public static function getDefaultImageUrl(): string
    {
        $defaultImg = public_path('images/no_image.png');

        if (file_exists($defaultImg)) {
            $imageUrl = asset('images/no_image.png');
        } else {
            $imageUrl = '';
        }

        return $imageUrl;
    }

    public function getStockStatus(): string
    {
        return $this->status ? __('general.in_stock') : __('general.out_of_stock');
    }
}
