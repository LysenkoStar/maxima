<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\CreateApplicationFormRequest;
use App\Services\ApplicationService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ApplicationController extends Controller
{
    public function submitForm(CreateApplicationFormRequest $request): RedirectResponse
    {
        try {
            app(ApplicationService::class)->createNewRequest($request);

            return redirect()
                ->back()
                ->with(
                    key: 'success',
                    value: __('messages.application.success.create')
                );
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            Log::error(
                message: 'Error creating application',
                context: [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]
            );

            return redirect()
                ->route('page.contacts')
                ->with(
                    key: 'error',
                    value: __('messages.application.error.create')
                );
        }
    }
}
