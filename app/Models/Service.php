<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $title
 * @property string $description
 * @property string $short_description
 * @property string $text
 * @property string $image
 * @property bool $status
 * @property bool $slug
 * @property bool $products_link
 * @property bool $applications_link
 */
class Service extends Model
{
    use HasTranslations;

    /**
     * Fields containing translation Spatie (field must be as json/text type)
     *
     * @var array
     */
    public array $translatable = ['title', 'description', 'short_description', 'text'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_services';

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'text',
        'image',
        'status',
        'slug',
        'products_link',
        'applications_link',
    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    public static function getDefaultImageUrl(): string
    {
        $defaultImg = public_path('images/no_image.webp');

        if (file_exists($defaultImg)) {
            $imageUrl = asset('images/no_image.webp');
        } else {
            $imageUrl = '';
        }

        return $imageUrl;
    }

    public function getImageUrl(): string
    {
        if ($this->image && Storage::disk('uploads')->exists("images/$this->image")) {
            return Storage::disk('uploads')->url("images/$this->image");
        } else {
            return $this::getDefaultImageUrl();
        }
    }
}
