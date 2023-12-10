<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pages
Route::controller(PageController::class)->name('page.')->group(function () {
    Route::get(uri:'/', action:'home')->name('home');
    Route::get(uri:'/products', action:'products')->name('products');
    Route::get(uri:'/services', action:'services')->name('services');
    Route::get(uri:'/about', action:'about')->name('about');
    Route::get(uri:'/payment-and-delivery', action:'paymentAndDelivery')->name('payment-and-delivery');
    Route::get(uri:'/contacts', action:'contacts')->name('contacts');
});

// Language switcher
Route::get(
        uri: '/language/{lang}',
        action: [LocalizationController::class, 'switchLanguage']
    )
    ->name(name: 'lang.switch')
    ->whereIn(parameters: 'lang', values: ['en', 'ru', 'uk']);
