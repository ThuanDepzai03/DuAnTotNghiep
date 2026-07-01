<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function showCheckout() {
        return view('checkout');
    }

    public function checkout(Request $request) {
        // Xử lý lưu đơn hàng vào DB ở đây
        // Sau khi lưu xong thì xóa giỏ hàng:
        session()->forget('cart');
        return view('success');
    }
}

// them nfkLAnas

