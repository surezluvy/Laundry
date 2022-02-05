<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

        Route::get('/', 'index')->name('home');
        Route::post('/', 'index')->name('home');
        Route::get('/all-laundry', 'allLaundry')->name('all-laundry');
        Route::get('/detail/{id}', 'detail')->name('detail');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('/pesan/{laundry_id}/{metode?}', 'pesan')->name('pesan');
            Route::post('/proses_pesan', 'proses_pesan')->name('proses_pesan');
        });

    });
    
});

Route::prefix('/user')->group(function () {

    Route::controller(UserController::class)->group(function () {

        Route::group(['middleware' => 'auth'], function () {
            // Profile
            Route::get('/profile', 'profile')->name('profile');
            Route::get('/setting', 'setting')->name('setting');
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

        Route::group(['middleware' => 'auth'], function () {

            Route::get('/all_booking', 'all_booking')->name('all_booking');
        });

    });

});