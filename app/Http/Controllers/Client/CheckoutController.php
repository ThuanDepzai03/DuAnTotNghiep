<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Hiển thị trang checkout
    public function index()
    {
        return view('checkout');
    }

    // Xử lý đặt hàng
    public function store(Request $request)
        {
    $cart = session('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')
            ->with('error', 'Giỏ hàng đang trống!');
    }

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
        'payment_method' => 'required',
    ]);
    // Tính tổng tiền
    $totalPrice = 0;

    foreach ($cart as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
    DB::beginTransaction();

try {

    $order = Order::create([
        'customer_name' => $request->customer_name,
        'phone' => $request->phone,
        'email' => null,
        'address' => $request->address,
        'note' => null,
        'total_price' => $totalPrice,
        'payment_method' => $request->payment_method,
        'status' => 'pending',
    ]);
    // Lưu chi tiết đơn hàng
    foreach ($cart as $item) {

        OrderItem::create([
            'order_id' => $order->id,
            'product_variant_id' => $item['variant_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);

    }

    DB::commit();

} catch (\Exception $e) {

    DB::rollBack();

     return back()->with('error', $e->getMessage());

}
    
    if ($request->payment_method === 'cod') {
    session()->forget('cart');
    return redirect()->route('checkout.success');
}

if ($request->payment_method === 'vnpay') {

    return redirect()->route('payment.vnpay', [
    'order' => $order->id
]);
}

return back()->with('error', 'Phương thức thanh toán không hợp lệ.');

}
}