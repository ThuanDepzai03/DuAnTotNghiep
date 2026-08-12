<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected function cityList(): array
    {
        return [
            'Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Hồ Chí Minh', 'Bình Dương', 'Đồng Nai', 'Khánh Hòa',
            'Hải Dương', 'Hưng Yên', 'Nam Định', 'Thái Bình', 'Nghệ An', 'Hà Tĩnh', 'Quảng Ninh',
            'Bắc Ninh', 'Vĩnh Phúc', 'Phú Thọ', 'Thái Nguyên', 'Bắc Giang', 'Lạng Sơn', 'Cao Bằng',
            'Hà Giang', 'Lào Cai', 'Yên Bái', 'Tuyên Quang', 'Hòa Bình', 'Sơn La', 'Điện Biên',
            ' Lai Châu', 'Hà Nam', 'Ninh Bình', 'Thanh Hóa', 'Ninh Thuận', 'Bình Thuận', 'Bắc Kạn',
            'Quảng Nam', 'Quảng Ngãi', 'Bình Định', 'Phú Yên', 'Gia Lai', 'Kon Tum', 'Dak Lak',
            'Dak Nong', 'Lâm Đồng', 'An Giang', 'Bạc Liêu', 'Bến Tre', 'Cần Thơ', 'Cà Mau', 'Đồng Tháp',
            'Long An', 'Sóc Trăng', 'Tiền Giang', 'Trà Vinh', 'Vĩnh Long', 'Kiên Giang', 'Hậu Giang',
            'Bà Rịa - Vũng Tàu', 'Cà Mau', 'Bình Phước', 'Bình Thuận', 'Tây Ninh', 'Ninh Bình', 'Hà Nội'
        ];
    }

    protected function wardListByCity(): array
    {
        return [
            'Hà Nội' => ['Phường Cống Vị', 'Phường Đội Cấn', 'Phường Liễu Giai', 'Phường Kim Liên', 'Phường Thanh Xuân Trung'],
            'Hải Phòng' => ['Phường Máy Chai', 'Phường Hạ Long', 'Phường Lê Chân', 'Phường Tràng Cát', 'Phường Đồng Hoà'],
            'Đà Nẵng' => ['Phường Hòa Cường Bắc', 'Phường Thanh Khê Đông', 'Phường Hải Châu I', 'Phường Nam Dương', 'Phường An Khê'],
            'Hồ Chí Minh' => ['Phường Bến Nghé', 'Phường Tân Bình', 'Phường 7', 'Phường Phú Nhuận', 'Phường Thủ Đức'],
            'Bình Dương' => ['Phường Thủ Dầu Một', 'Phường Chánh Nghĩa', 'Phường Hiệp An', 'Phường Bình Chuẩn', 'Phường Phú Hòa'],
            'Đồng Nai' => ['Phường Tân Biên', 'Phường Long Bình', 'Phường Trảng Dài', 'Phường Long Tân', 'Phường Xuân Hòa'],
            'Khánh Hòa' => ['Phường Lộc Thọ', 'Phường Vĩnh Hải', 'Phường Ngọc Hiển', 'Phường Xuân Hà', 'Phường Nha Trang'],
            'Cần Thơ' => ['Phường Cái Khế', 'Phường Bãi H L', 'Phường Tân An', 'Phường Ninh Kiều', 'Phường Hưng Lợi'],
        ];
    }

    public function index()
    {
        if (!session('customer')) {
            session(['url.intended' => route('checkout.show')]);

            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập hoặc đăng ký để đặt hàng.');
        }

        $customer = session('customer');

        $defaultCustomer = [
            'customer_name' => $customer['user'] ?? '',
            'phone' => $customer['tel'] ?? '',
            'city' => '',
            'ward' => '',
            'address_detail' => $customer['address'] ?? '',
        ];

        return view('checkout', compact('defaultCustomer'));
    }

    public function store(Request $request)
    {
        if (!session('customer')) {
            session(['url.intended' => route('checkout.show')]);

            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập hoặc đăng ký để đặt hàng.');
        }

        $cart = $this->getCartItems();

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống!');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'address_detail' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,vnpay',
        ]);

        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        }

        $voucherCode = trim((string) $request->input('voucher_code', ''));
        $discountAmount = 0;

        if ($voucherCode !== '') {
            $voucher = DB::table('vouchers')
                ->where('code', strtoupper($voucherCode))
                ->where('status', 1)
                ->first();

            if (!$voucher) {
                return back()->with('error', 'Mã giảm giá không hợp lệ hoặc đã hết hiệu lực.')->withInput();
            }

            $now = now();
            if (($voucher->start_date && $now->lt($voucher->start_date)) || ($voucher->end_date && $now->gt($voucher->end_date))) {
                return back()->with('error', 'Mã giảm giá hiện không còn hiệu lực.')->withInput();
            }

            if (($voucher->quantity ?? 0) <= 0) {
                return back()->with('error', 'Mã giảm giá đã hết lượt sử dụng.')->withInput();
            }

            if (($voucher->min_order_value ?? 0) > $totalPrice) {
                return back()->with('error', 'Đơn hàng chưa đạt giá trị tối thiểu để dùng mã giảm giá.')->withInput();
            }

            if (($voucher->discount_type ?? 'percent') === 'percent') {
                $discountAmount = round($totalPrice * ((float) ($voucher->discount_value ?? 0) / 100), 2);
            } else {
                $discountAmount = min((float) ($voucher->discount_value ?? 0), $totalPrice);
            }
        }

        $finalTotal = max(0, $totalPrice - $discountAmount);
        $address = trim($request->address_detail) . ', ' . trim($request->ward) . ', ' . trim($request->city);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'email' => session('customer.email') ?? null,
                'address' => $address,
                'address_detail' => $request->address_detail,
                'city' => $request->city,
                'ward' => $request->ward,
                'voucher_code' => $voucherCode !== '' ? strtoupper($voucherCode) : null,
                'discount_amount' => $discountAmount,
                'note' => null,
                'total_price' => $finalTotal,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            if ($voucherCode !== '') {
                DB::table('vouchers')
                    ->where('code', strtoupper($voucherCode))
                    ->decrement('quantity');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Đặt hàng thất bại: ' . $e->getMessage())->withInput();
        }

        $this->clearCartItems();

        if ($request->payment_method === 'cod') {
            return redirect()->route('checkout.success');
        }

        if ($request->payment_method === 'vnpay') {
            return redirect()->route('payment.vnpay', ['order' => $order->id]);
        }

        return back()->with('error', 'Phương thức thanh toán không hợp lệ.');
    }
}
