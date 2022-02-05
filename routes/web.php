<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
        Route::get('/all-laundry', 'allLaundry')->name('all-laundry');
        Route::get('/detail/{id}', 'detail')->name('detail');
    
        // Profile
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/profile-edit', 'profileEdit')->name('profile-edit');
        Route::post('/profile-change', 'profileChange')->name('profile-change');
    });
    
    Route::controller(AuthController::class)->group(function () {
        // Register
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'store')->name('store');

        // Login
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'auth')->name('authenticate');

        // Logout
        Route::get('/logout', 'logout')->name('logout');
    });

});

// Route::group(['middleware' => 'guest'], function () {
//     // Register
//     Route::get('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/register', [AuthController::class, 'store'])->name('store');
//     // Login
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
// });
