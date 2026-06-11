<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('products', 'Products::index');
$routes->get('products/detail/(:any)', 'Products::detail/$1');

$routes->get('about', 'About::index');

$routes->get('blog', 'Blog::index');
$routes->get('blog/detail/(:any)', 'Blog::detail/$1');

$routes->get('contact', 'Contact::index');

$routes->get('freelance', 'Freelance::index');

$routes->get('cart', 'Cart::index');

$routes->post('auth/login', 'Auth::login');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');

$routes->post('cart/add', 'Cart::add');
$routes->get('cart/remove/(:any)', 'Cart::remove/$1');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/checkout', 'Cart::checkout');
$routes->post('checkout/process', 'Cart::processCheckout');
$routes->get('checkout/received', 'Cart::orderReceived');

$routes->get('products/searchAjax', 'Products::searchAjax');

$routes->get('my-account', 'MyAccount::index');
$routes->get('my-account/orders', 'MyAccount::orders');
$routes->get('my-account/view-order/(:segment)', 'MyAccount::viewOrder/$1');
$routes->get('my-account/downloads', 'MyAccount::downloads');
$routes->get('my-account/addresses', 'MyAccount::addresses');
$routes->get('my-account/edit-address/(:segment)', 'MyAccount::editAddress/$1');
$routes->post('my-account/save-address/(:segment)', 'MyAccount::saveAddress/$1');
$routes->get('my-account/details', 'MyAccount::details');
$routes->post('my-account/update-details', 'MyAccount::updateDetails');

$routes->post('cart/apply_coupon', 'Cart::applyCoupon');
$routes->post('cart/remove_coupon', 'Cart::removeCoupon');