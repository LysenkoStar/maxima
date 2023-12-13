<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Session::has('locale') AND array_key_exists(Session::get('locale'), config('app.available_locales'))) {
                App::setLocale(Session::get('locale'));
            } else {
                App::setLocale(config('app.fallback_locale'));
            }

            return $next($request);
        } catch (\Exception $exception) {
            dd($exception);
        }

    }
}
