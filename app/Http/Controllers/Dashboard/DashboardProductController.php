<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardProductController extends Controller
{
    /**
     * Dashboard product create page
     * @param Request $request
     * @return View
     */
    public function createPage(Request $request): View
    {
        return view(view: 'admin.services.create');
    }
}
