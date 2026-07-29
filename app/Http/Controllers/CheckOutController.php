<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckOutController extends Controller
{
    public function showCheckout()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống.');
        }

        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'note' => $request->note,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {

            OrderItem::create([

                'order_id' => $order->id,

                'product_variant_id' => $item['variant_id'],

                'quantity' => $item['quantity'],

                'price' => $item['price']

            ]);

        }

        

        if ($request->payment_method === 'vnpay') {
            return redirect()->route('payment.vnpay', ['order_id' => $order->id]);
        }

        if ($request->payment_method === 'momo') {
            return redirect()->route('payment.momo', ['order_id' => $order->id]);
        }

        session()->forget('cart');
        return redirect()->route('checkout.success');
    }
}