<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function serviceByName(Service $service): View|RedirectResponse
    {
        try {
            return view(
                view: 'pages.services.index',
                data: ['service' => $service]
            );
        } catch (\Exception $e) {
            return redirect()
                ->route('page.services')
                ->with([
                    'alert-message' => $e->getMessage(),
                    'alert-type' => 'error',
                ]);
        }
    }
}
