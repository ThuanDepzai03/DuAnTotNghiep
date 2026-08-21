<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    protected function isFreeShippingVoucher($voucher): bool
    {
        if (!$voucher) {
            return false;
        }

        $discountType = strtolower((string) ($voucher['discount_type'] ?? $voucher['type'] ?? ''));
        $voucherCode = strtoupper((string) ($voucher['code'] ?? ''));
        $voucherName = strtolower((string) ($voucher['name'] ?? ''));

        return $discountType === 'free_shipping'
            || $voucherCode === 'FREESHIP'
            || str_contains($voucherName, 'miễn phí vận chuyển')
            || str_contains($voucherName, 'free ship')
            || str_contains($voucherName, 'freeship');
    }

    protected function calculateShippingFee(?string $city = null, ?string $ward = null, $voucher = null): float
    {
        if ($this->isFreeShippingVoucher($voucher)) {
            return 0;
        }

        $city = trim((string) ($city ?? ''));
        $wardValue = trim((string) ($ward ?? ''));
        $baseFee = 30000;

        if ($city === 'Hà Nội' || $city === 'Hồ Chí Minh' || $city === 'Đà Nẵng') {
            $baseFee = 35000;
        }

        if ($city === 'Bình Dương' || $city === 'Đồng Nai' || $city === 'Khánh Hòa') {
            $baseFee = 40000;
        }

        if ($wardValue !== '') {
            $baseFee += 5000;
        }

        return round($baseFee);
    }

    protected function cityList(): array
    {
        return [
            'Hà Nội',
            'Hải Phòng',
            'Đà Nẵng',
            'Hồ Chí Minh',
            'Bình Dương',
            'Đồng Nai',
            'Khánh Hòa',
            'Cần Thơ',
            'Bình Định',
            'Đà Lạt',
            'Thừa Thiên Huế',
            'Hải Dương',
            'Nam Định',
            'Quảng Ninh',
            'Bắc Ninh',
            'Vĩnh Phúc',
            'Phú Thọ',
            'Thái Nguyên',
            'Bắc Giang',
            'Lạng Sơn',
            'Cao Bằng',
            'Hà Giang',
            'Lào Cai',
            'Yên Bái',
            'Tuyên Quang',
            'Hòa Bình',
            'Sơn La',
            'Điện Biên',
            'Lai Châu',
            'Hà Nam',
            'Ninh Bình',
            'Thanh Hóa',
            'Nghệ An',
            'Hà Tĩnh',
            'Quảng Bình',
            'Quảng Trị',
            'Thừa Thiên Huế',
            'Quảng Nam',
            'Quảng Ngãi',
            'Bình Thuận',
            'Ninh Thuận',
            'Bình Phước',
            'Tây Ninh',
            'Long An',
            'Đồng Tháp',
            'An Giang',
            'Kiên Giang',
            'Cà Mau',
            'Bạc Liêu',
            'Sóc Trăng',
            'Trà Vinh',
            'Vĩnh Long',
            'Tiền Giang',
            'Bến Tre',
            'Hậu Giang',
            'Bà Rịa - Vũng Tàu',
            'Dak Lak',
            'Dak Nong',
            'Lâm Đồng'
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

    protected function ghnAddressRequest(
    string $endpoint,
    array $data = [],
    string $method = 'get'
): array {
    $token = config('services.ghn.token');

    if (empty($token)) {
        return [];
    }

    $http = Http::withHeaders([
        'Token' => $token,
        'ShopId' => config('services.ghn.shop_id') ?: '',
        'Content-Type' => 'application/json',
    ]);

    $response = $method === 'post'
        ? $http->post(config('services.ghn.api_url') . $endpoint, $data)
        : $http->get(config('services.ghn.api_url') . $endpoint, $data);

   if (!$response->successful()) {
    \Log::error('GHN API Error', [
        'endpoint' => $endpoint,
        'status' => $response->status(),
        'body' => $response->body(),
    ]);

    return [];
}

    $data = $response->json('data', []);

    return is_array($data) ? $data : [];
}

    public function addressOptions(Request $request)
{
    $type = $request->query('type');
    $parentId = $request->query('parent_id');

    if ($type === 'provinces') {

        $items = $this->ghnAddressRequest(
            '/master-data/province'
        );

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['ProvinceName'] ?? '',
                        'label' => $item['ProvinceName'] ?? '',
                        'id' => $item['ProvinceID'] ?? '',
                    ];
                })
                ->filter(fn ($item) => !empty($item['id']))
                ->values(),
        ]);
    }

    if ($type === 'districts' && $parentId !== null) {

        $items = $this->ghnAddressRequest(
            '/master-data/district',
            [
                'province_id' => (int) $parentId,
            ],
            'get'
        );

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['DistrictName'] ?? '',
                        'label' => $item['DistrictName'] ?? '',
                        'id' => $item['DistrictID'] ?? '',
                    ];
                })
                ->filter(fn ($item) => !empty($item['id']))
                ->values(),
        ]);
    }

    if ($type === 'wards' && $parentId !== null) {

        $items = $this->ghnAddressRequest(
            '/master-data/ward',
            [
                'district_id' => (int) $parentId,
            ],
            'post'
        );

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['WardName'] ?? '',
                        'label' => $item['WardName'] ?? '',
                        'id' => $item['WardCode'] ?? '',
                    ];
                })
                ->filter(fn ($item) => !empty($item['id']))
                ->values(),
        ]);
    }

    return response()->json([
        'items' => []
    ], 400);
}

    public function index()
    {
        if (!session('customer')) {
            session(['url.intended' => route('checkout.show')]);

            return redirect()
                ->route('login')
                ->with('error', 'Vui lòng đăng nhập hoặc đăng ký để đặt hàng.');
        }

        // ==============================
        // KHÁCH HÀNG
        // ==============================

        $customer = session('customer');


        // ==============================
        // GIỎ HÀNG
        // ==============================

        $cartKey = $customer && !empty($customer['id'])
            ? 'cart.' . $customer['id']
            : 'cart.guest';

        $cart = session($cartKey, []);


        // ==============================
        // LẤY VOUCHER
        // ==============================

        $vouchers = Voucher::where('status', 1)
            ->where('discount_type', 'percent')
            ->where(function ($query) {
                $query->whereNull('quantity')
                    ->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->where(function ($query) {
                $query->whereNull('start_date')
                    ->orWhereDate('start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', now());
            })
            ->latest()
            ->get();


        // ==============================
        // TRẢ VỀ CHECKOUT
        // ==============================

        return view('checkout', compact(
            'cart',
            'vouchers'
        ));
    }

    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string',
        ], [
            'voucher_code.required' => 'Vui lòng nhập mã voucher.',
        ]);

        $code = strtoupper(trim($request->voucher_code));
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher) {
            return redirect()->route('checkout.show')->with('voucher_error', 'Mã voucher không tồn tại.');
        }

        if ((int) $voucher->status !== 1) {
            return redirect()->route('checkout.show')->with('voucher_error', 'Voucher hiện đang bị khóa.');
        }

        if (
            $voucher->quantity !== null &&
            $voucher->used_quantity >= $voucher->quantity
        ) {
            return back()
                ->with('error', 'Mã giảm giá đã hết lượt sử dụng.')
                ->withInput();
        }

        if ($voucher->start_date && now()->toDateString() < $voucher->start_date) {
            return redirect()->route('checkout.show')->with('voucher_error', 'Voucher chưa đến thời gian sử dụng.');
        }

        if ($voucher->end_date && now()->toDateString() > $voucher->end_date) {
            return redirect()->route('checkout.show')->with('voucher_error', 'Voucher đã hết hạn.');
        }

        $voucherPayload = [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'name' => $voucher->name,
            'discount_type' => $voucher->discount_type,
            'discount_value' => $voucher->discount_value,
            'max_discount' => $voucher->max_discount,
        ];

        if ($voucher->discount_type === 'free_shipping') {
            $voucherPayload['name'] = $voucher->name ?: 'Miễn phí vận chuyển';
            $voucherPayload['discount_value'] = 0;
            $voucherPayload['max_discount'] = 0;
            $voucherPayload['is_free_shipping'] = true;
        }

        session()->put('voucher', $voucherPayload);

        return redirect()->route('checkout.show')->with('voucher_success', $voucher->discount_type === 'free_shipping' ? 'Áp dụng voucher miễn phí vận chuyển thành công!' : 'Áp dụng voucher thành công!');
    }

    public function removeVoucher()
    {
        session()->forget('voucher');

        return redirect()->route('checkout.show')->with('voucher_success', 'Đã bỏ mã voucher.');
    }

    public function store(Request $request)
    {
        // ==============================
        // KIỂM TRA ĐĂNG NHẬP
        // ==============================

        if (!session('customer')) {
            session(['url.intended' => route('checkout.show')]);

            return redirect()
                ->route('login')
                ->with('error', 'Vui lòng đăng nhập hoặc đăng ký để đặt hàng.');
        }


        // ==============================
        // LẤY GIỎ HÀNG
        // ==============================

        $cart = $this->getCartItems();

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Giỏ hàng đang trống!');
        }


        // ==============================
        // VALIDATE
        // ==============================

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'address_detail' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,vnpay',
        ]);


        // ==============================
        // TÍNH TỔNG TIỀN GỐC
        // ==============================

        $totalPrice = 0;

        foreach ($cart as $item) {

            $price = (float) ($item['price'] ?? 0);
            $quantity = (int) ($item['quantity'] ?? 0);

            $totalPrice += $price * $quantity;
        }


        // ==============================
        // LẤY VOUCHER TỪ SESSION
        // ==============================

        $sessionVoucher = session('voucher');

        $voucher = null;
        $discountAmount = 0;


        // ==============================
        // XỬ LÝ VOUCHER
        // ==============================

        if ($sessionVoucher) {

            $voucher = Voucher::find($sessionVoucher['id']);

            // Voucher không tồn tại
            if (!$voucher) {

                session()->forget('voucher');

                return back()
                    ->with('error', 'Voucher không tồn tại.')
                    ->withInput();
            }


            // Voucher bị khóa
            if ((int) $voucher->status !== 1) {

                session()->forget('voucher');

                return back()
                    ->with('error', 'Voucher hiện đang bị khóa.')
                    ->withInput();
            }


            // Kiểm tra số lượng
            if (
                $voucher->quantity !== null &&
                $voucher->used_quantity >= $voucher->quantity
            ) {

                session()->forget('voucher');

                return back()
                    ->with('error', 'Voucher đã hết lượt sử dụng.')
                    ->withInput();
            }


            // Kiểm tra ngày bắt đầu
            if (
                $voucher->start_date &&
                now()->toDateString() < $voucher->start_date
            ) {

                session()->forget('voucher');

                return back()
                    ->with('error', 'Voucher chưa đến thời gian sử dụng.')
                    ->withInput();
            }


            // Kiểm tra ngày kết thúc
            if (
                $voucher->end_date &&
                now()->toDateString() > $voucher->end_date
            ) {

                session()->forget('voucher');

                return back()
                    ->with('error', 'Voucher đã hết hạn.')
                    ->withInput();
            }


            // ==============================
            // KIỂM TRA ĐƠN TỐI THIỂU
            // ==============================

            if (($voucher->min_order ?? 0) > $totalPrice) {
                return back()
                    ->with('error', 'Đơn hàng chưa đạt giá trị tối thiểu để dùng mã giảm giá.')
                    ->withInput();
            }


            // ==============================
            // TÍNH GIẢM GIÁ
            // ==============================

            if ($voucher->discount_type === 'percent') {

                // Ví dụ:
                // 25.470.000 × 10% = 2.547.000

                $discountAmount =
                    $totalPrice *
                    ((float) $voucher->discount_value / 100);


                // ==============================
                // GIỚI HẠN GIẢM TỐI ĐA
                // ==============================

                if (
                    $voucher->max_discount !== null &&
                    $discountAmount > (float) $voucher->max_discount
                ) {

                    $discountAmount =
                        (float) $voucher->max_discount;
                }
            } else {

                // Voucher giảm tiền cố định

                $discountAmount = min(
                    (float) $voucher->discount_value,
                    $totalPrice
                );
            }


            // Làm tròn
            $discountAmount = round($discountAmount);
        }


        // ==============================
        // TỔNG SAU GIẢM
        // ==============================

        $finalTotal = max(
            0,
            $totalPrice - $discountAmount
        );


        // ==============================
        // ĐỊA CHỈ
        // ==============================

        $address =
            trim($request->address_detail)
            . ', '
            . trim($request->ward)
            . ', '
            . trim($request->city);


        // ==============================
        // TẠO ĐƠN HÀNG
        // ==============================

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

                'voucher_id' => $voucher ? $voucher->id : null,

                'voucher_code' => $voucher
                    ? strtoupper($voucher->code)
                    : null,

                'discount_amount' => $discountAmount,

                'note' => null,

                // Tổng tiền trước giảm
                'total_price' => $totalPrice,

                // Tổng tiền sau giảm
                'final_price' => $finalTotal,

                'payment_method' => $request->payment_method,
                'status' => $orderStatus,
            ]);


            // ==============================
            // CHI TIẾT ĐƠN HÀNG
            // ==============================

            foreach ($cart as $item) {

                OrderItem::create([

                    'order_id' =>
                    $order->id,

                    'product_variant_id' =>
                    $item['variant_id'],

                    'quantity' =>
                    $item['quantity'],

                    'price' =>
                    $item['price'],
                ]);
            }


            // ==============================
            // TĂNG SỐ LƯỢNG ĐÃ SỬ DỤNG
            // ==============================

            if ($voucher) {

                $voucher->increment('used_quantity');
            }


            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Đặt hàng thất bại: ' . $e->getMessage()
                )
                ->withInput();
        }


        // ==============================
        // XÓA GIỎ HÀNG
        // ==============================

        $this->clearCartItems();

        // Xóa voucher khỏi session
        session()->forget('voucher');


        // ==============================
        // THANH TOÁN COD
        // ==============================

        if ($request->payment_method === 'cod') {

            return redirect()
                ->route('checkout.success');
        }


        // ==============================
        // THANH TOÁN VNPAY
        // ==============================

        if ($request->payment_method === 'vnpay') {

            return redirect()
                ->route('payment.vnpay', [
                    'order' => $order->id
                ]);
        }


        return back()
            ->with(
                'error',
                'Phương thức thanh toán không hợp lệ.'
            );
    }
}
