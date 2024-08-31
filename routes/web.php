<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function() {
    Route::get('register', [LoginController::class, 'register'])->name('customer.register');
    Route::post('register/store', [LoginController::class, 'store'])->name('customer.store');
    Route::get('login', [LoginController::class, 'index'])->name('customer.login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('customer.profile');
});


Route::group(['middleware' => 'admin.guest'], function() {
    Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::group(['middleware' => 'admin.auth'], function() {
    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', CategoryController::class);
});