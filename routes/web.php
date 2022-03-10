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
            Route::get('/pesan/{laundry_id}/', 'layanan')->name('layanan');
            Route::get('/pesan/{laundry_id}/{layanan_id?}/{metode?}', 'pesan')->name('pesan');
            Route::post('/proses_pesan', 'proses_pesan')->name('proses_pesan');

            Route::prefix('/booking')->group(function () {
                Route::get('/all-booking', 'allBooking')->name('all_booking');
                Route::get('/track-booking/{id}', 'trackBooking')->name('track');
            });
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


Route::prefix('/admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {

        Route::middleware(['adminMitra', 'auth'])->group(function () {
            Route::get('/', 'dashboard')->name('admin-dashboard');
            
            Route::middleware(['admin'])->group(function () {
                Route::prefix('/mitra')->group(function () {
                    Route::get('/', 'mitra')->name('mitra-data');
                    Route::post('/update/{id}', 'mitraUpdate')->name('mitra-update');
                    Route::post('/delete/{id}', 'mitraDelete')->name('mitra-delete');
                    Route::post('/add-mitra', 'mitraAdd')->name('add-mitra');
                });
    
                Route::prefix('/customer')->group(function () {
                    Route::get('/', 'customer')->name('customer-data');
                    Route::post('/update/{id}', 'customerUpdate')->name('customer-update');
                    Route::post('/delete/{id}', 'customerDelete')->name('customer-delete');
                    Route::post('/add-customer', 'customerAdd')->name('add-customer');
                });
    
                Route::prefix('/laundry')->group(function () {
                    Route::get('/', 'laundry')->name('laundry-data');
                    Route::post('/update/{id}', 'laundryUpdate')->name('laundry-update');
                    Route::post('/updateStatus/{id}', 'laundryUpdateStatus')->name('laundry-update-status');
                    Route::post('/delete/{id}', 'laundryDelete')->name('laundry-delete');
                    Route::post('/daftarkan-laundry', 'laundryAddProcess')->name('register-laundry-admin');
                });
                
                Route::prefix('/ongkir')->group(function () {
                    Route::get('/', 'ongkir')->name('ongkir-data');
                    Route::post('/add-ongkir', 'ongkirAdd')->name('add-ongkir');
                });
            });
            
            Route::middleware(['mitra'])->group(function () {
                Route::prefix('/booking')->group(function () {
                    Route::get('/', 'booking')->name('booking-data');
                    Route::post('/update/{id}', 'bookingUpdate')->name('booking-update');
                    Route::get('/{id}/{status}', 'changeStatus')->name('change-status');
                });
                Route::prefix('/layanan')->group(function () {
                    Route::get('/', 'layanan')->name('layanan-data');
                    Route::post('/add-layanan', 'addLayanan')->name('add-layanan');
                    Route::post('/updateLayanan/{id}', 'layananUpdate')->name('layanan-update');
                    Route::post('/deleteLayanan/{id}', 'layananDelete')->name('layanan-delete');
                });

                Route::middleware(['mitraDontHaveLaundry'])->group(function () {
                    Route::get('/daftarkan-laundry', 'registerLaundry')->name('register-laundry');
                    Route::post('/daftarkan-laundry', 'registerLaundryProccess')->name('register-laundry');
                });
                
                Route::get('/laundry-change', 'laundryChange')->name('admin-laundry-change');
                Route::post('/laundry-change-process/{id}', 'laundryChangeProccess')->name('admin-laundry-change-process');
                Route::post('/send-notification/{laundryId}/{userId}', 'sendNotif')->name('send-notif');
            });

            Route::get('/profile2', 'profile2')->name('admin-profile2');

            Route::get('/profile', 'profile')->name('admin-profile');
            Route::get('/profile-change', 'profileChange')->name('admin-profile-change');

            Route::post('/profile-change-process/{id}', 'profileChangeProccess')->name('admin-profile-change-process');

            Route::get('/logout', 'logout')->name('admin-logout');
        });

        Route::middleware(['guest'])->group(function () {
            Route::get('/login', 'login')->name('admin-login');
            Route::post('/login', 'loginProcess')->name('admin-login');

            // Register admin/mitra
            // Route::get('/register', 'register')->name('admin-register');
            // Route::post('/register', 'registerProcess')->name('admin-register');
        });

    });

});