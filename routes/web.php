<?php

use App\Http\Controllers\OxfordCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\OxfordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Routes
Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'HomeMain')->name('home');
    Route::get('/sale-motorcycles', 'ForSale')->name('sale-motorcycles');
    Route::get('/rentals-motorcycle', 'RentBike')->name('rentals-motorcycle');
    Route::get('/rentals-honda-pcx-125', 'DemoDetails')->name('rental-details');
    Route::get('/rentals-information', 'RentInformation')->name('rental-information');
    Route::get('/services', 'GetServices')->name('services');
    Route::get('/service-repairs', 'Repairs')->name('service-repairs');
    Route::get('/service-motorcycle', 'ServiceBike')->name('service-motorcycle');
    Route::get('/service-mot', 'ServiceMot')->name('service-mot');
    Route::get('/accident-management-services', 'AccidentClaim')->name('road-traffic-accidents');
    // Route::get('/shop', 'GetProducts')->name('get-products');
    Route::get('/gps-tracker', 'GpsTracker')->name('gps-tracker');
    Route::get('/spare-parts', 'SpareParts')->name('spare-parts');
    Route::get('/about', 'AboutMethod')->name('about.page');
    Route::get('/contact', 'ContactMethod')->name('contact.page');
});

// Oxford Product Routes
Route::controller(OxfordController::class)->group(function () {
    Route::get('/category/{category_id}', 'getProductCategory')->name('product.category');
    Route::get('/item/{id}', 'getOxfordProduct')->name('item.details');
});

// Cart Routes
Route::controller(OxfordController::class)->group(function () {
    Route::get('/product-cart', 'oxfordCart')->name('product.cart');
    Route::get('/product/{id}', 'addProductCart')->name('addproduct.cart');
    Route::patch('/update-product-cart', 'updateCart')->name('update.product.cart');
    Route::patch('/delete-cart-product', 'deleteProduct')->name('delete.cart.product');
});

// Contact All Routes 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});
