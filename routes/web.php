<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function() {
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', 'dashboard')->middleware(['ensure-loged-out'])->name('dashboard');
        Route::get('/show', 'indexUser')->name('user-get');
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/user', 'indexUser')->name('user.index');
        Route::get('/user/edit/{userid}', 'edit')->name('user.edit');
        Route::put('/user/{userid}', 'update')->name('user.update');
        Route::delete('/user/delete/{userid}', 'destroy')->name('user.destroy');
        // ini rute resize
        Route::get('/user/resize/{userid}', 'resize')->name('user.resize');
        Route::put('/user/resize/{userid}', 'resizePost')->name('user.resizePost');

        // ini rute gallery 
        Route::resource('gallery', GalleryController::class);

    });
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });
});
