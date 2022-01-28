<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/register', function () {
        return view('main.register');
    });
    // Route::get('/posts', [HomeController::class, 'posts'])->name('posts');
    // Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');
    // Route::post('/signup', [HomeController::class, 'signup'])->name('signup');
    // Route::post('/login')->name('login')->middleware('cekstatus');
    // Route::get('/dashboard', [HomeController::class, 'adminPanel'])->name('dashboard');
    // Route::get('/dashboardUser', [HomeController::class, 'userPanel'])->name('dashboardUser');

    // Route::get('/author/{author:id}', function(User $author){
    //     return view('author',[
    //         'title' => "Post by author : $author->name",
    //         'posts' => $author->posts,
    //     ]);
    // })->name('author');
});