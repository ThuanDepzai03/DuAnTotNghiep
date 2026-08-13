<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;

class CheckoutController extends Controller
{
    /**
     * Hiển thị trang thanh toán
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * ÁP DỤNG VOUCHER
     */
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string',
        ], [
            'voucher_code.required' => 'Vui lòng nhập mã voucher.',
        ]);

        $code = strtoupper(trim($request->voucher_code));

        $voucher = Voucher::where('code', $code)->first();

        // Không tồn tại
        if (!$voucher) {
            return redirect()
                ->route('checkout.show')
                ->with('voucher_error', 'Mã voucher không tồn tại.');
        }

        // Bị khóa
        if ((int) $voucher->status !== 1) {
            return redirect()
                ->route('checkout.show')
                ->with('voucher_error', 'Voucher hiện đang bị khóa.');
        }

        // Hết số lượng
        if (
            $voucher->quantity !== null &&
            $voucher->used_quantity >= $voucher->quantity
        ) {
            return redirect()
                ->route('checkout.show')
                ->with('voucher_error', 'Voucher đã hết lượt sử dụng.');
        }

        // Chưa đến ngày sử dụng
        if (
            $voucher->start_date &&
            now()->toDateString() < $voucher->start_date
        ) {
            return redirect()
                ->route('checkout.show')
                ->with('voucher_error', 'Voucher chưa đến thời gian sử dụng.');
        }

        // Đã hết hạn
        if (
            $voucher->end_date &&
            now()->toDateString() > $voucher->end_date
        ) {
            return redirect()
                ->route('checkout.show')
                ->with('voucher_error', 'Voucher đã hết hạn.');
        }

        // Lưu voucher vào session
        session()->put('voucher', [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'name' => $voucher->name,
            'discount_type' => $voucher->discount_type,
            'discount_value' => $voucher->discount_value,
            'max_discount' => $voucher->max_discount,
        ]);

        return redirect()
            ->route('checkout.show')
            ->with('voucher_success', 'Áp dụng voucher thành công!');
    }

    /**
     * BỎ VOUCHER
     */
    public function removeVoucher()
    {
        session()->forget('voucher');

        return redirect()
            ->route('checkout.show')
            ->with('voucher_success', 'Đã bỏ mã voucher.');
    }

    /**
     * ĐẶT HÀNG
     */
    public function store(Request $request)
    {
        $customer = session('customer');

        $cartKey = $customer && !empty($customer['id'])
            ? 'cart.' . $customer['id']
            : 'cart.guest';

        $cart = session($cartKey, []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Giỏ hàng đang trống.');
        }

        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | TÍNH TỔNG TIỀN GỐC
        |--------------------------------------------------------------------------
        */

        $totalPrice = 0;

        foreach ($cart as $item) {
            $price = isset($item['price'])
                ? (float) $item['price']
                : 0;

            $quantity = isset($item['quantity'])
                ? (int) $item['quantity']
                : 0;

            $totalPrice += $price * $quantity;
        }

        /*
        |--------------------------------------------------------------------------
        | TÍNH GIẢM VOUCHER
        |--------------------------------------------------------------------------
        */

        $discountAmount = 0;
        $voucher = null;

        if (session()->has('voucher')) {

            $voucherSession = session('voucher');

            $voucher = Voucher::find($voucherSession['id']);

            if ($voucher) {

                $validVoucher =
                    (int) $voucher->status === 1
                    &&
                    (
                        $voucher->quantity === null
                        ||
                        $voucher->used_quantity < $voucher->quantity
                    )
                    &&
                    (
                        !$voucher->start_date
                        ||
                        now()->toDateString() >= $voucher->start_date
                    )
                    &&
                    (
                        !$voucher->end_date
                        ||
                        now()->toDateString() <= $voucher->end_date
                    );

                if ($validVoucher) {

                    /*
                    |--------------------------------------------------------------------------
                    | GIẢM THEO %
                    |--------------------------------------------------------------------------
                    */

                    if ($voucher->discount_type === 'percent') {

                        $discountAmount =
                            $totalPrice *
                            ((float) $voucher->discount_value / 100);

                        /*
                        | Giảm tối đa
                        */

                        if (
                            !empty($voucher->max_discount) &&
                            $discountAmount > (float) $voucher->max_discount
                        ) {
                            $discountAmount =
                                (float) $voucher->max_discount;
                        }
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | GIẢM THEO TIỀN
                    |--------------------------------------------------------------------------
                    */ elseif ($voucher->discount_type === 'fixed') {

                        $discountAmount =
                            (float) $voucher->discount_value;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Không giảm quá tổng tiền
                    |--------------------------------------------------------------------------
                    */

                    if ($discountAmount > $totalPrice) {
                        $discountAmount = $totalPrice;
                    }

                    $discountAmount = round($discountAmount);
                } else {

                    $voucher = null;

                    session()->forget('voucher');
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | TỔNG THANH TOÁN SAU KHI GIẢM
        |--------------------------------------------------------------------------
        */

        $finalTotal = $totalPrice - $discountAmount;

        if ($finalTotal < 0) {
            $finalTotal = 0;
        }

        /*
        |--------------------------------------------------------------------------
        | TẠO ĐƠN HÀNG
        |--------------------------------------------------------------------------
        */

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'note' => $request->note,

            // Lưu tổng tiền SAU KHI GIẢM
            'total_price' => $finalTotal,

            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        /*
        |--------------------------------------------------------------------------
        | CHI TIẾT ĐƠN HÀNG
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $item['variant_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | TĂNG LƯỢT SỬ DỤNG VOUCHER
        |--------------------------------------------------------------------------
        */

        if ($voucher) {
            $voucher->increment('used_quantity');
        }

        /*
        |--------------------------------------------------------------------------
        | XÓA VOUCHER
        |--------------------------------------------------------------------------
        */

        session()->forget('voucher');

        /*
        |--------------------------------------------------------------------------
        | THANH TOÁN VNPAY
        |--------------------------------------------------------------------------
        */

        if ($request->payment_method === 'vnpay') {

            return redirect()->route(
                'payment.vnpay',
                ['order' => $order->id]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | THANH TOÁN MOMO
        |--------------------------------------------------------------------------
        */

        if ($request->payment_method === 'momo') {

            return redirect()->route('checkout.momo');
        }

        /*
        |--------------------------------------------------------------------------
        | COD
        |--------------------------------------------------------------------------
        */

        session()->forget($cartKey);

        return redirect()
            ->route('checkout.success');
    }
}
