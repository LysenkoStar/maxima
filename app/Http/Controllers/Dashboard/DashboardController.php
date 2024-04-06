<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Service;
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
        $services = Service::paginate(3);

        return view(
            view: 'admin.services.list',
            data: compact('services')
        );
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

    /**
     * Dashboard categories page
     * @param Request $request
     * @return View
     */
    public function categories(Request $request): View
    {
        $categories = ProductCategory::paginate(3);

        return view(
            view: 'admin.categories.list',
            data: compact('categories')
        );
    }
}
