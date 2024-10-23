<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CkeditorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ApplicationController;
use \App\Http\Controllers\Dashboard\ApplicationController as DashboardApplicationController;
use \App\Http\Controllers\Dashboard\ServiceController as DashboardServiceController;
use \App\Http\Controllers\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
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
Route::controller(ProductController::class)
    ->name('products.')
    ->group(function () {
        Route::get(uri:'/products/category/{category:slug}', action: 'productsByCategory')->name('by.category');
        Route::get(uri:'/products/{product}', action: 'productItem')->name('item');
});

// Services
Route::controller(ServiceController::class)
    ->name('services.')
    ->group(function () {
        Route::get(uri:'/services/{service:slug}', action: 'serviceByName')->name('by.name');
});

// Applications
Route::controller(ApplicationController::class)
    ->name('applications.')
    ->group(function () {
        Route::post(uri:'/applications/store', action: 'submitForm')->name('store');
    });

// Media
Route::get('/media/{id}/download', [MediaController::class, 'downloadMedia'])->name('media.download');

// Language switcher
Route::get(
        uri: '/language/{lang}',
        action: [LocalizationController::class, 'switchLanguage']
    )
    ->name(name: 'lang.switch')
    ->whereIn(parameters: 'lang', values: ['en', 'ru', 'uk']);

// Search
Route::get(uri: '/search', action: [SearchController::class, 'search'])
    ->name('search');


// Admin page
Route::controller(DashboardController::class)
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard', action: 'home')->name('home');
        Route::get(uri:'/dashboard/services', action: 'services')->name('services');
        Route::get(uri:'/dashboard/products', action: 'products')->name('products');
        Route::get(uri:'/dashboard/applications', action: 'applications')->name('applications');
        Route::get(uri:'/dashboard/categories', action: 'categories')->name('categories');
});

// Admin service page
Route::controller(DashboardServiceController::class)
    ->name('dashboard.services.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard/services/create', action: 'form')->name('form');
        Route::post(uri:'/dashboard/services/store', action: 'store')->name('store');
        Route::get(uri:'/dashboard/services/{service}/edit', action: 'edit')->name('edit');
        Route::put('/dashboard/services/{service}', 'update')->name('update');
        Route::delete('/dashboard/services/{service}/delete', 'delete')->name('delete');
        Route::post(uri:'/dashboard/services/create-slug', action: 'createServiceSlug')->name('create.slug');
    });

// Admin product page
Route::controller(DashboardProductController::class)
    ->name('dashboard.products.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard/products/create', action: 'form')->name('form');
        Route::post(uri:'/dashboard/products/store', action: 'store')->name('store');
        Route::get(uri:'/dashboard/products/{product}/edit', action: 'edit')->name('edit');
        Route::put('/dashboard/products/{product}', 'update')->name('update');
        Route::delete('/dashboard/products/{product}/delete', 'delete')->name('delete');
        Route::post(uri:'/dashboard/products/create-slug', action: 'createServiceSlug')->name('create.slug');
    });

// Admin category page
Route::controller(CategoryController::class)
    ->name('dashboard.category.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard/categories/create', action: 'form')->name('form');
        Route::post(uri:'/dashboard/categories/store', action: 'store')->name('store');
        Route::get(uri:'/dashboard/categories/{category}/edit', action: 'edit')->name('edit');
        Route::put('/dashboard/categories/{category}', 'update')->name('update');
        Route::delete('/dashboard/categories/{category}/delete', 'delete')->name('delete');
        Route::post(uri:'/dashboard/categories/create-slug', action: 'createServiceSlug')->name('create.slug');
    });

// Admin category page
Route::controller(DashboardApplicationController::class)
    ->name('dashboard.application.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get(uri:'/dashboard/application/{application}/show', action: 'show')->name('show');
        Route::delete('/dashboard/application/{application}/delete', 'delete')->name('delete');
    });

// Admin ckeditor controller
Route::controller(CkeditorController::class)
    ->name('dashboard.ckeditor.')
    ->middleware(['auth'])
    ->group(function () {
        Route::post(uri:'/ckeditor/media/upload', action: 'mediaImageUpload')->name('media.image.upload');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
