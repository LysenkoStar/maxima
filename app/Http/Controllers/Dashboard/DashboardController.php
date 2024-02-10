<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard home page
     * @param Request $request
     * @return View
     */
    public function home(Request $request): View
    {
        return view(view: 'admin.dashboard');
    }

    /**
     * Dashboard home page
     * @param Request $request
     * @return View
     */
    public function services(Request $request): View
    {
        return view(view: 'admin.services.list');
    }

    /**
     * Dashboard home page
     * @param Request $request
     * @return View
     */
    public function products(Request $request): View
    {
        return view(view: 'admin.products.list');
    }

    /**
     * Dashboard applications page
     * @param Request $request
     * @return View
     */
    public function applications(Request $request): View
    {
        return view(view: 'admin.applications.list');
    }
}
