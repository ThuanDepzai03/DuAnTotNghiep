<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// 1. Trang chủ (Mặc định hoặc ?action=home)
Route::get('/', [HomeController::class, 'home'])->name('home');

// 2. Trang danh sách sản phẩm (?action=shop)
Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');

// 3. Chi tiết sản phẩm (?action=detail)
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

// 4. Giỏ hàng (?action=addcart & ?action=showcart & ?action=updatecart)
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// 5. Thanh toán (?action=showcheckout & ?action=checkoutsubmit)
Route::get('/checkout', [CheckOutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout/submit', [CheckOutController::class, 'checkout'])->name('checkout.submit');

// 6. Trang quét mã QR Momo (?action=momo)
Route::get('/checkout/momo', function() {
    return view('checkout_qr'); // Sẽ tương ứng với file checkout_qr.blade.php
})->name('checkout.momo');

// 7. Trang hoàn thành đơn hàng (?action=success)
Route::get('/checkout/success', function() {
    return view('success'); // Sẽ tương ứng với file success.blade.php
})->name('checkout.success');

// 8. Giới thiệu & Liên hệ (?action=about & ?action=contact)
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('web')->group(function () {
    Route::get('/account/profile', [AuthController::class, 'profile'])->name('account.profile');
    Route::post('/account/profile', [AuthController::class, 'updateProfile'])->name('account.update');
});

// Admin dashboard and management modules
Route::middleware(['web', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});