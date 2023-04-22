<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\OxfordController;
use App\Http\Controllers\CartController;

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
    Route::get('/motorcycle-sales', 'BikesForSale')->name('sale-motorcycles');
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

// Motorcycle Sales & Rental Routes
Route::controller(SalesController::class)->group(function () {
    Route::get('/new-motorcycles', 'NewForSale')->name('new.motorcycles');
    Route::get('/new-motorcycle/{id}', 'NewBikeDetails')->name('detail.new-motorcycle');
    Route::get('/used-motorcycles', 'UsedForSale')->name('used.motorcycles');
    Route::get('/used-motorcycle/{id}', 'UsedBikeDetails')->name('detail.used-motorcycle');
    Route::get('/rentals-motorcycle', 'RentBike')->name('rental.motorcycles');
    Route::get('/rentals-motorcycle/{id}', 'RentalBikeDetails')->name('detail.rental-motorcycle');
});

// Oxford Product Routes
Route::controller(OxfordController::class)->group(function () {
    Route::get('/category/{category_id}', 'getProductCategory')->name('product.category');
    Route::get('/item/{id}', 'getOxfordProduct')->name('item.details');
});

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('product.cart');
Route::get('/add-product', [CartController::class, 'add'])->name('addproduct.cart');
Route::post('/cart/{id}', [CartController::class, 'store'])->name('store.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('product.checkout');

// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', 'index')->name('product.cart');
//     Route::get('/add-product/{id}', 'add')->name('addproduct.cart');
//     Route::post('/cart', 'store')->name('cart.store');
// });

// Contact All Routes 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});
