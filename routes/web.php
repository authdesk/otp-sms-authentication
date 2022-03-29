<?php

use Illuminate\Support\Facades\Route;

//admin cobtroller define here
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;



//site cobtroller define here
use App\Http\Controllers\SiteController;

//user cobtroller define here
use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\Frontend\Auth\OTPController;



//Site routes
Route::get('/', function () {
    return view('welcome');
});




require __DIR__.'/auth.php';

//user profile


//otp sms login route
Route::get('/login-by-phone-number', [OTPController::class, 'login_by_phone_number'])->name('login-by-phone-number');
Route::post('/login-phone-number-check/{number}', [OTPController::class, 'login_phone_number_check'])->name('login-phone-number-check');
Route::post('/login-phone-number-create-auth/{phone}', [OTPController::class, 'login_phone_number_create_auth'])->name('login-phone-number-create-auth');


Route::middleware('auth')->group(function(){

    //frontend routes
    Route::get('dashboard', [SiteController::class, 'index'])->name('dashboard');

    //admin dashboard route
    Route::get('user-profile', [UserController::class, 'index'])->name('user-profile');

});



//admin routes

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){

        //admin login route
        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])->name('adminlogin');

    });

    Route::middleware('admin')->group(function(){

        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        //settings routes
        Route::resource('settings', SettingController::class);
        Route::get('active-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'active_settings']);
        Route::get('inactive-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'inactive_settings']);

    });

    //admin logout route
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});