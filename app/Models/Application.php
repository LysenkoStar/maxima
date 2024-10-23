<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $ip_address
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Application extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'max_applications';

    protected $fillable = ['name', 'email', 'phone', 'message', 'ip_address'];

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

}
