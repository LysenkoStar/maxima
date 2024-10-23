<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function show(Application $application): View
    {
        return view(
            view: 'admin.applications.show',
            data: ['application' => $application]
        );
    }

    public function delete(Application $application): RedirectResponse|Redirector
    {
        try {
            app(ApplicationService::class)->deleteRequest(application: $application);

            return redirect()
                ->route('dashboard.applications')
                ->with(
                    key: 'success',
                    value: __('dashboard/applications/messages.success.delete'),
                );
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.applications')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }
}
