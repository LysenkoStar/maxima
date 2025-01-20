<?php

namespace App\Models;

use App\Enums\Images\ProductImageSizes;
use App\Events\Product\DeletedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $full_info
 * @property string $slug
 * @property int product_category_id
 * @property bool $status
 * @property float $price
 * @property bool $show_price
 */
class Product extends Model
{
    use HasTranslations, SoftDeletes;

    /**
     * Fields containing translation Spatie (field must be as json/text type)
     *
     * @var array
     */
    public array $translatable = ['name', 'description', 'full_info'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_products';

    protected $fillable = [
        'name',
        'description',
        'full_info',
        'product_category_id',
        'status',
        'slug',
        'price',
        'show_price',
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'trashed' => DeletedEvent::class,
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
        return $this->images()->main()->first();
    }

    public function getImageDirectoryPath(): string
    {
        return "products/{$this->id}";
    }

    public function isExistImageFolder(): bool
    {
        return Storage::disk('uploads')->exists($this->getImageDirectoryPath());
    }

    public function getMainImageUrl(): string
    {
        $mainImage = $this->getMainImage();

        if ($mainImage && Storage::disk('uploads')->exists("{$this->getImageDirectoryPath()}/$mainImage->image")) {
            return Storage::disk('uploads')->url("{$this->getImageDirectoryPath()}/$mainImage->image");
        }

        return $this->getDefaultImageUrl();
    }

    /**
     * Получить URL изображения нужного размера.
     *
     * @param ProductImageSizes $size Размер изображения
     * @return string URL изображения
     */
    public function getImageUrlBySize(ProductImageSizes $size = ProductImageSizes::small): string
    {
        $image = $this->getMainImage();

        if ($image) {
            return $image->getThumbnailUrl($size);
        }

        return $this->getDefaultImageUrl();
    }

    public function getImagesBySize(ProductImageSizes $size = ProductImageSizes::small): Collection
    {
        $images = $this->images()
            ->active()
            ->orderBy('sort')
            ->get(['id', 'image', 'description', 'product_id', 'sort']);

        if ($images->isEmpty()) {
            $defaultImageUrl = $this->getDefaultImageUrl();

            return collect([
                (new ProductImage([
                    'image' => $defaultImageUrl,
                    'description' => sprintf("%s %s", $this->name, __('general.image')),
                    'product_id' => $this->id,
                    'sort' => 0,
                ]))->setAttribute('url', $defaultImageUrl)
            ]);
        }

        return $images->map(function (ProductImage $image, int $index) use ($size) {
            $image->url = $image->getThumbnailUrl($size);

            $customDescription = sprintf("%s %s №%d", $this->name, __('general.image'), ($index + 1));
            $image->description = $image->description ?? $customDescription;

            return $image;
        })->values();
    }

    public function getDefaultImageUrl(): string
    {
        $defaultImg = public_path('images/no_image.webp');

        if (file_exists($defaultImg)) {
            $imageUrl = asset('images/no_image.webp');
        } else {
            $imageUrl = '';
        }

        return $imageUrl;
    }

    public function getStockStatus(): string
    {
        return $this->status ? __('general.in_stock') : __('general.out_of_stock');
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function isShowPrice(): bool
    {
        return $this->show_price;
    }
}
