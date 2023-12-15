<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Products
Route::controller(ProductController::class)->name('products.')->group(function () {
    Route::get(uri:'/products/category/{category}', action: 'productsByCategory')->name('by.category');
});

// Language switcher
Route::get(
        uri: '/language/{lang}',
        action: [LocalizationController::class, 'switchLanguage']
    )
    ->name(name: 'lang.switch')
    ->whereIn(parameters: 'lang', values: ['en', 'ru', 'uk']);

// Admin page
Route::controller(DashboardController::class)
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard', action: 'home')->name('home');
        Route::get(uri:'/dashboard/services', action: 'services')->name('services');
        Route::get(uri:'/dashboard/products', action: 'products')->name('products');
        Route::get(uri:'/dashboard/applications', action: 'applications')->name('applications');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
