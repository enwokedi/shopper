<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Shopper\CartController;
use App\Http\Controllers\Shopper\SalesController;
use App\Http\Controllers\Shopper\OxfordController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\UserController;

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
    Route::get('/new-motorcycles', 'NewForSale')->name('motorcycles.new');
    Route::get('/new-motorcycle/{id}', 'NewBikeDetails')->name('new-motorcycle.detail');
    Route::get('/used-motorcycles', 'UsedForSale')->name('motorcycles.used');
    Route::get('/used-motorcycle/{id}', 'UsedBikeDetails')->name('detail.used-motorcycle');
    Route::get('/motorcycle-rentals', 'RentBike')->name('motorcycle.rentals');
    Route::get('/rentals-motorcycle/{id}', 'RentalBikeDetails')->name('rental-motorcycle.detail');
});

// Oxford Product Routes
Route::controller(OxfordController::class)->group(function () {
    Route::get('/oxcat/{category_id}', 'getProductCategory')->name('product.category');
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
    Route::get('/contact/call-back', 'CallMeBack')->name('contact.call-back');
    Route::get('/contact/trade-account', 'TradeAccount')->name('contact.trade-account');
    Route::get('/contact/new-motorcycle/{id}', 'ContactNewSales')->name('contact.new-sales');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});

Route::post('/mail', [MailController::class, 'sendMail']);

// Subscriber Route
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/dashboard', 'HomeController@dashboard')->name('home.index'); // Edit later to use the correct controller
    Route::resource('rentals', 'RentalController');

    // Motorcycle Resources
    Route::resource('motorcycles', 'MotorcycleController');

    // User Resources
    Route::resource('users', 'UserController');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

// Admin Route Grouping
// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::resource('rentals', [RentalController::class]);
//     // Route::resource('products', 'ProductController');
// });
