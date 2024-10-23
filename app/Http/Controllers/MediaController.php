<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    /**
     * @param int $media_id
     * @return Response|BinaryFileResponse
     */
    public function downloadMedia(int $media_id): Response|BinaryFileResponse
    {
        try {
            $media = Media::findOrFail($media_id);

            $filePath = $media->file_path;

            if (!Storage::disk('public')->exists($filePath)) {
                Log::warning(
                    message: 'Media file does not exist',
                    context: [
                        'media_id' => $media_id,
                        'file_path' => $filePath,
                    ]
                );

                abort(404, 'File not found');
            }

            return Storage::disk('public')->download(path: $filePath, name: $media->file_name);
        } catch (\Exception $exception) {
            Log::error(message: $exception->getMessage());
        }
    }
}
