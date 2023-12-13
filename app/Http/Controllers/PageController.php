<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
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
        return view('pages/home');
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
     * @return View
     */
    public function services(Request $request): View
    {
        return view('pages/services');
    }

    /**
     * About page
     * @param Request $request
     * @return View
     */
    public function about(Request $request): View
    {
        return view('pages/about');
    }

    /**
     * Payment and delivery page
     * @param Request $request
     * @return View
     */
    public function paymentAndDelivery(Request $request): View
    {
        return view('pages/payment_and_delivery');
    }

    /**
     * Contacts page
     * @param Request $request
     * @return View
     */
    public function contacts(Request $request): View
    {
        return view('pages/contacts');
    }
}
