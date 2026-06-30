<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductController;

// 1. Trang chủ (Mặc định hoặc ?action=home)
Route::get('/', [HomeController::class, 'home'])->name('home');

// 2. Trang danh sách sản phẩm (?action=shop)
Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');

// 3. Chi tiết sản phẩm (?action=detail)
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

// 4. Giỏ hàng (?action=addcart & ?action=showcart & ?action=updatecart)
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
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