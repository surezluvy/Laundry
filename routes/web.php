<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

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

Route::prefix('/')->group(function () {

    Route::controller(HomeController::class)->group(function () {

        Route::group(['middleware' => ['auth', 'customer']], function () {
            Route::get('/', 'index')->name('home');
            Route::post('/', 'index')->name('home');
            Route::get('/all-laundry', 'allLaundry')->name('all-laundry');
            Route::get('/detail/{id}', 'detail')->name('detail');
            Route::get('/pesan/{laundry_id}/{metode?}', 'pesan')->name('pesan');
            Route::post('/proses_pesan', 'proses_pesan')->name('proses_pesan');
        });

    });
    
});

Route::prefix('/user')->group(function () {

    Route::controller(UserController::class)->group(function () {

        Route::group(['middleware' => ['auth', 'customer']], function () {
            // Profile
            Route::get('/', 'profile')->name('profile');
            Route::get('/setting', 'setting')->name('setting');
            Route::get('/address-change', 'addressChange')->name('address-change');
            Route::post('/address-change', 'addressChangeProcess')->name('address-change');
            Route::post('/profile-change', 'profileChange')->name('profile-change');
        
            // Logout
            Route::get('/logout', 'logout')->name('logout');
        });

        Route::group(['middleware' => 'guest'], function () {
            // Register
            Route::get('/register', 'register')->name('register');
            Route::post('/register', 'store')->name('store');
    
            // Login
            Route::get('/login', 'login')->name('login');
            Route::post('/login', 'auth')->name('authenticate');
        });

    });

});

Route::prefix('/booking')->group(function () {

    Route::controller(BookingController::class)->group(function () {

        Route::group(['middleware' => ['auth', 'customer']], function () {
            Route::get('/all_booking', 'all_booking')->name('all_booking');
        });

    });

});


Route::prefix('/admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {

        Route::middleware(['adminMitra', 'auth'])->group(function () {
            Route::get('/', 'dashboard')->name('admin-dashboard');
            
            Route::prefix('/booking')->middleware(['admin'])->group(function () {
                Route::get('/', 'booking')->name('booking-data');
                Route::post('/update', 'bookingUpdate')->name('booking-update');
                Route::get('/{id}/{status}', 'changeStatus')->name('change-status');
            });

            Route::prefix('/mitra')->middleware(['admin'])->group(function () {
                Route::get('/', 'mitra')->name('mitra-data');
            });

            Route::prefix('/customer')->middleware(['admin'])->group(function () {
                Route::get('/', 'customer')->name('customer-data');
                Route::post('/update', 'customerUpdate')->name('customer-update');
            });

            Route::prefix('/laundry')->middleware(['admin'])->group(function () {
                Route::get('/', 'laundry')->name('laundry-data');
                Route::post('/update', 'laundryUpdate')->name('laundry-update');
            });

            Route::get('/logout', 'logout')->name('admin-logout');
        });

        Route::middleware(['guest'])->group(function () {
            Route::get('/login', 'login')->name('admin-login');
            Route::post('/login', 'loginProcess')->name('admin-login');
        });

    });

});