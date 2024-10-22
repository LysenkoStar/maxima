<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * Home page
     * @param Request $request
     * @return View
     */
    public function home(Request $request): View
    {
        $categories = ProductCategory::where('status', 1)
            ->limit(6)
            ->get();

        return view(
            view: 'pages/home',
            data: [
                'categories' => $categories
            ]
        );
    }

    /**
     * Products page
     * @param Request $request
     * @return View
     */
    public function products(Request $request): View
    {
        $categories = ProductCategory::where('status', 1)->get();

        return view(
            view: 'pages/products',
            data: [
                'categories' => $categories
            ]);
    }

    /**
     * Services page
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function services(Request $request): View|RedirectResponse
    {
        try {
            $services = Service::get();

            return view(
                view: 'pages/services',
                data: ['services' => $services]
            );
        } catch (\Exception $e) {
            return redirect()
                ->route('page.services')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    /**
     * About page
     * @param Request $request
     * @return View
     */
    public function about(Request $request): View
    {
        return view(view: 'pages/about');
    }

    /**
     * Payment and delivery page
     * @param Request $request
     * @return View
     */
    public function paymentAndDelivery(Request $request): View
    {
        return view(view: 'pages/payment_and_delivery');
    }

    /**
     * Contacts page
     * @param Request $request
     * @return View
     */
    public function contacts(Request $request): View
    {
        return view(view: 'pages/contacts');
    }
}
