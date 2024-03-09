<?php

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('general.menus.Home'), route('page.home'));
});

// Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('general.menus.Contacts'), route('page.contacts'));
});

// Products
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('general.menus.Products'), route('page.products'));
});

// Services
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('general.menus.Services'), route('page.services'));
});

// About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('general.menus.About Us'), route('page.about'));
});

// Payment and delivery
Breadcrumbs::for('payment-and-delivery', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('general.menus.Payment and delivery'), route('page.payment-and-delivery'));
});

// Products by category
Breadcrumbs::for('products.by.category', function (BreadcrumbTrail $trail, ProductCategory $productCategory) {
    $trail->parent('products');
    $trail->push($productCategory->name, route('products.by.category', $productCategory));
});

// Service current
Breadcrumbs::for('services.by.name', function (BreadcrumbTrail $trail, Service $service) {
    $trail->parent('services');
    $trail->push($service->name, route('services.by.name', $service));
});

// Product
Breadcrumbs::for('product.show', function (BreadcrumbTrail $trail, Product $product) {
    $trail->parent('products.by.category', );
    $trail->push(__('general.menus.Products'), route('page.products'));
});

// 404
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Not Found');
});
