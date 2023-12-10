<?php

namespace App\Http\Controllers;

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
        return view('pages/products');
    }

    /**
     * Services page
     * @param Request $request
     * @return View
     */
    public function services(Request $request): View
    {
        return view('pages/home');
    }

    /**
     * About page
     * @param Request $request
     * @return View
     */
    public function about(Request $request): View
    {
        return view('pages/home');
    }

    /**
     * Payment and delivery page
     * @param Request $request
     * @return View
     */
    public function paymentAndDelivery(Request $request): View
    {
        return view('pages/contacts');
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
