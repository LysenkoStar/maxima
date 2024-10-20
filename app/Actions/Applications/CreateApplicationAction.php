<?php

namespace App\Actions\Applications;

use App\Http\Requests\Application\CreateApplicationFormRequest;
use App\Models\Application;
use App\Models\Media;
use App\Traits\AsAction;
use Illuminate\Http\UploadedFile;

class CreateApplicationAction
{
    use AsAction;

    /**
     * @throws \Exception
     */
    public function handle(CreateApplicationFormRequest $request)
    {
        $application = Application::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'ip_address' => $request->getClientIp(),
        ]);

        if ($request->hasFile('files')) {
            /** @var UploadedFile $file **/
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('uploads/applications', 'public');

                $media = new Media([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);

                $application->media()->save($media);
            }
        }
    }
}
