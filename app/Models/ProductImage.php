<?php

namespace App\Models;

use App\Enums\Images\ProductImageSizes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property string $original_name
 * @property string $description
 * @property string $mime_type
 * @property int $sort
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 */
class ProductImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_product_images';

    protected $fillable = [
        'product_id',
        'image',
        'original_name',
        'description',
        'mime_type',
        'sort',
        'status'
    ];

    // Scopes
    public function scopeMain($query): Builder
    {
        return $query->where('status', 1)
            ->orderBy('sort', 'asc')
            ->take(1);
    }

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }

    // Relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Methods
    private function getBaseName(): string
    {
        return pathinfo($this->image, PATHINFO_FILENAME);
    }

    public function getDirectoryPath(): string
    {
        return "products/{$this->product_id}/{$this->id}";
    }

    public function getOriginalUrl(): string
    {
        return Storage::disk('uploads')->url($this->getDirectoryPath() . "/{$this->image}");
    }

    public function getMainUrl(): string
    {
        return Storage::disk('uploads')->url($this->getDirectoryPath() . "/{$this->getBaseName()}.webp");
    }

    public function getThumbnailUrl(ProductImageSizes $size): string
    {
        return Storage::disk('uploads')->url($this->getDirectoryPath() . "/{$size->name}_{$this->getBaseName()}.webp");
    }

    public function getAllThumbnails(): Collection
    {
        return collect(ProductImageSizes::asArray())
            ->mapWithKeys(function ($width, $size) {
                $img_size = ProductImageSizes::from($width);

                return [$size => $this->getThumbnailUrl($img_size)];
            });
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('uploads')->url("{$this->getDirectoryPath()}/{$this->image}");
    }

    public function getImageDescription(): string|null
    {
        return $this->description;
    }

    public function isExistInFolder(): bool
    {
        $folder = Storage::disk('uploads')->exists($this->getDirectoryPath());
        $files = Storage::disk('uploads')->files($this->getDirectoryPath());

        return $folder && !empty($files);
    }
}
