<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\OxfordsController;

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
    Route::get('/products', 'GetProducts')->name('get-products');
    Route::get('/gps-tracker', 'GpsTracker')->name('gps-tracker');
    Route::get('/spare-parts', 'SpareParts')->name('spare-parts');
    Route::get('/about', 'AboutMethod')->name('about.page');
    Route::get('/contact', 'ContactMethod')->name('contact.page');
});

// Oxford Product Routes
Route::controller(OxfordsController::class)->group(function () {
    Route::get('/shop', 'getOxfordProducts')->name('categories.oxford-products');
    Route::get('/products/{brand}', 'getHelmets')->name('categories.helmets');
});

// Contact All Routes 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});
