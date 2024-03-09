<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $title
 * @property string $description
 * @property string $short_description
 * @property string $text
 * @property string $image
 * @property bool $status
 * @property bool $slug
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
    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];
}
