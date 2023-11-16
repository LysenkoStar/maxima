<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function switchLanguage(string $locale): RedirectResponse
    {
        if (array_key_exists($locale, config('app.available_locales'))) {
            Session::put('locale', $locale);
        }

        return Redirect::back();
    }
}
