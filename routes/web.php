<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Front\WebsiteController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\OrderController;

Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
Route::get('foods', [WebsiteController::class, 'foods'])->name('website.foods');
Route::get('foods/categtory/{id}', [WebsiteController::class, 'categtory_foods'])->name('website.categtory_foods');
Route::get('foods/restaurant/{id}', [WebsiteController::class, 'restaurant_foods'])->name('website.restaurant_foods');
Route::post('foods/search/', [WebsiteController::class, 'search_foods'])->name('website.search_foods');

// cart routes
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/delete', [CartController::class, 'delete'])->name('cart.delete');

// wishlist routes
Route::post('wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');

Route::group(['middleware' => 'guest'], function() {
    Route::get('register', [LoginController::class, 'register'])->name('customer.register');
    Route::post('register/store', [LoginController::class, 'store'])->name('customer.store');
    Route::get('login', [LoginController::class, 'index'])->name('customer.login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('customer.profile');

    // cart show route
    Route::get('carts', [CartController::class, 'index'])->name('cart.index');
    // wishlist show route
    Route::get('wishlists', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist/delete', [WishlistController::class, 'delete'])->name('wishlist.delete');
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('order/add', [OrderController::class, 'add_order'])->name('order.add');
});


Route::group(['middleware' => 'admin.guest'], function() {
    Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::group(['middleware' => 'admin.auth'], function() {
    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/restaurants', RestaurantController::class);
    Route::resource('admin/foods', FoodController::class);
});