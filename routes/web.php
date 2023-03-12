<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Route::get('checkout', [App\Http\Controllers\Admin\Frontend\CheckoutController::class, 'index']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    // user controller

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete', 'destroy');
    });

    // google controller
    Route::controller(App\Http\Controllers\Admin\GoogleController::class)->group(function () {
        Route::get('google', 'index');
        Route::get('google-export', 'export')->name('google.export');
        Route::post('google-import', 'import')->name('google.import');
    });
});
