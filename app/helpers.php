<?php

use Illuminate\Support\Arr;

if (! function_exists('get_available_languages')) {
    function get_available_languages(): array
    {
        $languages = config('app.available_locales');

        if (Arr::accessible($languages) && !empty($languages)) {
            return $languages;
        }

        return [];
    }
}

if (! function_exists('get_current_language')) {
    function get_current_language(): string
    {
        $locale = app()->getLocale();
        $available_locales = config('app.available_locales');
        $language = Arr::get($available_locales, $locale);
        return __('dashboard/general.languages.'.$language);
    }
}

if (! function_exists('get_current_language_flag')) {
    function get_current_language_flag(): string
    {
        $locale = app()->getLocale();

        return asset("images/icon_$locale.svg");
    }
}
