<?php

use App\Models\ProductCategory;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('page.home'));
});

// Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Contacts'), route('page.contacts'));
});

// Products
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Products'), route('page.products'));
});

// Services
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Services'), route('page.services'));
});

// About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('About Us'), route('page.about'));
});

// Payment and delivery
Breadcrumbs::for('payment-and-delivery', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Payment and delivery'), route('page.payment-and-delivery'));
});

// Products by category
Breadcrumbs::for('products.by.category', function (BreadcrumbTrail $trail, ProductCategory $productCategory) {
    $trail->parent('products');
    $trail->push($productCategory->name, route('products.by.category', $productCategory));
});
