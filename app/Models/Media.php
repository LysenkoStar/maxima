<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property string $mime_type
 * @property int $size
 * @property string $mediable_type
 * @property int $mediable_id
 * @property string $created_at
 * @property string $updated_at
 */
class Media extends Model
{
    use HasFactory;

    protected $table = 'max_media';

    protected $fillable = ['file_name', 'file_path', 'mime_type', 'size'];

    /**
     * @return MorphTo
     */
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    // Methods

    /**
     * @return void
     */
    public function deleteFile()
    {
        if (Storage::disk('public')->exists($this->file_path)) {
            Storage::disk('public')->delete($this->file_path);
        }
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($media) {
            $media->deleteFile(); // Delete the file when deleting the model
        });
    }
}
