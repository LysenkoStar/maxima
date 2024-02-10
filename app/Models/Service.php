<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    /**
     * Fields containing translation Spatie (field must be as json/text type)
     *
     * @var array
     */
    public array $translatable = ['name', 'description', 'short_description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_services';

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'image',
        'status',
        'slug',
    ];
}
