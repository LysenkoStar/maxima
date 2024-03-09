<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CkeditorController extends Controller
{
    /**
     * Dashboard product create page
     * @param Request $request
     * @return JsonResponse
     */
    public function mediaImageUpload(Request $request): JsonResponse
    {
        /** @var UploadedFile $image **/
        $image = $request->file('upload');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storePubliclyAs('uploads/ckeditor', $imageName, 'public');

        return response()->json(['url' => asset("storage/$imagePath")]);
    }
}
