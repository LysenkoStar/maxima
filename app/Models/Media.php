<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $table = 'max_media';

    protected $fillable = ['file_name', 'file_path', 'mime_type', 'size'];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
