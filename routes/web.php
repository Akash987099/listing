<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(App\Http\Controllers\Logincontroller::class)->group(function() {
    Route::match(['get', 'post'], '/admin/login', 'adminLogin')->name('adminLogin');
    Route::match(['get', 'post'], '/admin/logins', 'adminLogins')->name('adminLogins');
    Route::match(['get', 'post'], '/member/login', 'memberLogin')->name('memberLogin');
    Route::match(['get', 'post'], '/member/logins', 'memberLogins')->name('memberLogins');
});

// working on this
Route::controller(ForgotPasswordController::class)->group(function() {
    Route::get('member/forget-password', 'ForgetPassword')->name('ForgetPasswordGet');
    Route::post('member/forget-password', 'ForgetPasswordStore')->name('ForgetPasswordPost');
    Route::get('member/reset-password/{token}', 'ResetPassword')->name('ResetPasswordGet');
    Route::post('member/reset-password', 'ResetPasswordStore')->name('ResetPasswordPost');
    
    Route::get('admin/forget-password', 'ForgetPasswords')->name('ForgetPasswordGets');
    Route::post('admin/forget-password', 'ForgetPasswordStores')->name('ForgetPasswordPosts');
    Route::get('admin/reset-password/{token}', 'ResetPasswords')->name('ResetPasswordGets');
    Route::post('admin/reset-password', 'ResetPasswordStores')->name('ResetPasswordPosts');
});

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {

    Route::controller(App\Http\Controllers\LogoutController::class)->group(function() {
        Route::match(['get', 'post'], '/logout', 'adminlogout')->name('logout');
    });

    Route::controller(App\Http\Controllers\Admincontroller::class)->group(function() {
        Route::match(['get', 'post'], '/', 'index')->name('index');
       
    });

});