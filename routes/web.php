<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\MailController;




Route::get('/', function () {
    return view('auth.otp-login');
});

Route::get('send-mail', [MailController::class, 'index']);

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\Admin\UserController::class, 'searchUsers']);

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

    // request controller
    Route::controller(App\Http\Controllers\Admin\RequestController::class)->group(function () {
        Route::get('/requests', 'index');
    });
});

// otp controller
Route::controller(AuthOtpController::class)->group(function () {
    Route::get('/otp/login', 'login')->name('otp.login');
    Route::post('/otp/generate', 'generate')->name('otp.generate');
    Route::get('/otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('/otp/login', 'loginWithOtp')->name('otp.getlogin');
});
