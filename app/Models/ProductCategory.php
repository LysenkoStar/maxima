<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $name
 * @property string $description
 * @property string $image
 * @property bool $status
 * @property bool $slug
 *
 * @method static active()
 */
class ProductCategory extends Model
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
    protected $table = 'max_product_categories';

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'slug',
    ];

    // Scopes
    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }

    // Methods
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrl(): string
    {
        if ($this->image && Storage::disk('uploads')->exists("categories/$this->image")) {
            return Storage::disk('uploads')->url("categories/$this->image");
        } else {
            return $this::getDefaultImageUrl();
        }
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
}
