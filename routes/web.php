<?php

use Illuminate\Support\Facades\Route;

// Client Controllers
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CheckoutController as ClientCheckoutController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\ProductVariantController;
// Admin Controllers cũ của nhóm
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController as AdminProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// ================= CLIENT =================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ClientProductController::class, 'index'])->name('shop');

Route::get('/detail/{id}', [ClientProductController::class, 'show'])->name('product.detail');

Route::get('/cart', [ClientCartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [ClientCartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [ClientCartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [ClientCartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [ClientCheckoutController::class, 'index'])->name('checkout.show');
Route::post('/checkout/submit', [ClientCheckoutController::class, 'store'])->name('checkout.submit');

Route::get('/checkout/momo', function () {
    return view('checkout_qr');
})->name('checkout.momo');

Route::get('/checkout/success', function () {
    return view('success');
})->name('checkout.success');

Route::get('/payment/vnpay/{order}', [PaymentController::class, 'vnpay'])
    ->name('payment.vnpay');

Route::get('/payment/vnpay-return', [PaymentController::class, 'vnpayReturn'])
    ->name('payment.vnpay.return');


Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/news', [HomeController::class, 'news'])->name('news');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// ================= AUTH =================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/account/profile', [AuthController::class, 'profile'])->name('account.profile');
Route::post('/account/profile', [AuthController::class, 'updateProfile'])->name('account.update');

Route::get('/account/orders/{id}', [AuthController::class, 'orderDetail'])
    ->name('account.order.detail');

Route::get('/orders/tracking', [App\Http\Controllers\Client\OrderTrackingController::class, 'index'])
    ->name('orders.tracking');

Route::get('/orders/tracking/{id}', [App\Http\Controllers\Client\OrderTrackingController::class, 'show'])
    ->name('orders.tracking.show');

Route::put('/account/orders/{id}/cancel', [AuthController::class, 'cancelOrder'])
    ->name('account.order.cancel');

// ================= ADMIN =================

Route::middleware(['web', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::get(
            '/products/{product}/variants',
            [ProductVariantController::class, 'index']
        )->name('products.variants.index');

        Route::post(
            '/products/{product}/variants',
            [ProductVariantController::class, 'store']
        )->name('products.variants.store');

        Route::put(
            '/products/{product}/variants/{variant}',
            [ProductVariantController::class, 'update']
        )->name('products.variants.update');

        Route::delete(
            '/products/{product}/variants/{variant}',
            [ProductVariantController::class, 'destroy']
        )->name('products.variants.destroy');

        Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])
            ->name('categories.restore');

        Route::resource('products', AdminProductController::class);

        Route::post('/products/{id}/restore', [AdminProductController::class, 'restore'])
            ->name('products.restore');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        Route::resource('users', UserController::class);

        Route::get('/statistics/revenue', [OrderController::class, 'revenue'])
    ->name('statistics.revenue');
    });
