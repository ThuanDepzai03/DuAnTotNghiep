<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

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

    protected function publicAddressRequest(string $url): array
    {
        try {
            $response = Http::timeout(8)->get($url);

            if (!$response->successful()) {
                return [];
            }

            $data = $response->json();

            return is_array($data) ? $data : [];
        } catch (\Throwable $exception) {
            \Log::warning('Public address API error', [
                'url' => $url,
                'message' => $exception->getMessage(),
            ]);

            return [];
        }
    }

    public function addressOptions(Request $request)
{
    $type = $request->query('type');
    $parentId = $request->query('parent_id');

    if ($type === 'provinces') {

        $items = $this->ghnAddressRequest(
            '/master-data/province'
        );

        if (empty($items)) {
            $items = $this->publicAddressRequest('https://provinces.open-api.vn/api/?depth=1');
        }

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['ProvinceName'] ?? $item['name'] ?? '',
                        'label' => $item['ProvinceName'] ?? $item['name'] ?? '',
                        'id' => $item['ProvinceID'] ?? $item['code'] ?? '',
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

        if (empty($items)) {
            $items = $this->publicAddressRequest(
                'https://provinces.open-api.vn/api/p/' . (int) $parentId . '?depth=2'
            );
            $items = $items['districts'] ?? [];
        }

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['DistrictName'] ?? $item['name'] ?? '',
                        'label' => $item['DistrictName'] ?? $item['name'] ?? '',
                        'id' => $item['DistrictID'] ?? $item['code'] ?? '',
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

        if (empty($items)) {
            $items = $this->publicAddressRequest(
                'https://provinces.open-api.vn/api/d/' . (int) $parentId . '?depth=2'
            );
            $items = $items['wards'] ?? [];
        }

        return response()->json([
            'items' => collect($items)
                ->map(function ($item) {
                    return [
                        'value' => $item['WardName'] ?? $item['name'] ?? '',
                        'label' => $item['WardName'] ?? $item['name'] ?? '',
                        'id' => $item['WardCode'] ?? $item['code'] ?? '',
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
        $customerRecord = DB::table('nguoidung')->where('id', $customer['id'] ?? 0)->first();
        $defaultCustomer = [
            'customer_name' => $customerRecord->user ?? $customer['user'] ?? '',
            'phone' => $customerRecord->tel ?? $customer['tel'] ?? '',
            'city' => $customerRecord->city ?? $customer['city'] ?? '',
            'ward' => $customerRecord->ward ?? $customer['ward'] ?? '',
            'address_detail' => $customerRecord->address_detail ?? $customer['address_detail'] ?? $customerRecord->address ?? $customer['address'] ?? '',
        ];


        // ==============================
        // GIỎ HÀNG
        // ==============================

        $cartKey = $customer && !empty($customer['id'])
            ? 'cart.' . $customer['id']
            : 'cart.guest';

        $cart = session($cartKey, []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống.');
        }

        $totalPrice = collect($cart)->sum(function ($item) {
            return (float) ($item['price'] ?? 0) * (int) ($item['quantity'] ?? 0);
        });

        $cityOptions = $this->cityList();
        $wardOptions = $this->wardListByCity();

        $shippingVoucher = session('shipping_voucher');
        $orderVoucher = session('order_voucher');
        $voucher = $orderVoucher ?: $shippingVoucher;
        $discountAmount = 0;
        $shippingFee = $this->calculateShippingFee($defaultCustomer['city'] ?? '', $defaultCustomer['ward'] ?? '', $shippingVoucher);

        foreach ([$shippingVoucher, $orderVoucher] as $voucherPayload) {
            if ($voucherPayload && isset($voucherPayload['id'])) {
                $voucherModel = Voucher::find($voucherPayload['id']);

                if ($voucherModel && (int) $voucherModel->status === 1) {
                $validVoucher = (
                    ($voucherModel->quantity === null || $voucherModel->used_quantity < $voucherModel->quantity)
                    && (!$voucherModel->start_date || now()->toDateString() >= $voucherModel->start_date)
                    && (!$voucherModel->end_date || now()->toDateString() <= $voucherModel->end_date)
                );

                    if ($validVoucher) {
                    if ($voucherModel->discount_type === 'free_shipping') {
                        $shippingFee = 0;
                    } elseif ($voucherModel->discount_type === 'percent') {
                        $discountAmount = $totalPrice * ((float) $voucherModel->discount_value / 100);
                        if (!empty($voucherModel->max_discount) && $discountAmount > (float) $voucherModel->max_discount) {
                            $discountAmount = (float) $voucherModel->max_discount;
                        }
                    } elseif ($voucherModel->discount_type === 'fixed') {
                        $discountAmount = (float) $voucherModel->discount_value;
                    }

                    if ($discountAmount > $totalPrice) {
                        $discountAmount = $totalPrice;
                    }
                    $discountAmount = round($discountAmount);
                    } else {
                        session()->forget($voucherModel->discount_type === 'free_shipping' ? 'shipping_voucher' : 'order_voucher');
                    }
                } else {
                    session()->forget($voucherModel->discount_type === 'free_shipping' ? 'shipping_voucher' : 'order_voucher');
                }
            }
        }


        // ==============================
        // TRẢ VỀ CHECKOUT
        // ==============================

        return view('checkout', compact(
            'cart',
            'cityOptions',
            'wardOptions',
            'defaultCustomer',
            'totalPrice',
            'shippingFee',
            'discountAmount',
            'finalTotal',
            'voucher',
            'shippingVoucher',
            'orderVoucher'
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

        $voucherKind = $request->input('voucher_kind', 'order');
        if (($voucherKind === 'shipping') !== ($voucher->discount_type === 'free_shipping')) {
            return redirect()->route('checkout.show')->with('voucher_error', $voucherKind === 'shipping'
                ? 'Ô này chỉ nhận voucher phí vận chuyển.'
                : 'Ô này chỉ nhận voucher đơn hàng.');
        }

        $voucherPayload = [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'name' => $voucher->name,
            'discount_type' => $voucher->discount_type,
            'discount_value' => $voucher->discount_value,
            'max_discount' => $voucher->max_discount,
            'min_order' => $voucher->min_order,
        ];

        if ($voucher->discount_type === 'free_shipping') {
            $voucherPayload['name'] = $voucher->name ?: 'Miễn phí vận chuyển';
            $voucherPayload['discount_value'] = 0;
            $voucherPayload['max_discount'] = 0;
            $voucherPayload['is_free_shipping'] = true;
        }

        $sessionKey = $voucher->discount_type === 'free_shipping'
            ? 'shipping_voucher'
            : 'order_voucher';

        session()->put($sessionKey, $voucherPayload);
        session()->forget('voucher');

        return redirect()->route('checkout.show')->with('voucher_success', $voucher->discount_type === 'free_shipping' ? 'Áp dụng voucher phí vận chuyển thành công!' : 'Áp dụng voucher đơn hàng thành công!');
    }

    public function removeVoucher(Request $request)
    {
        $key = $request->input('voucher_kind') === 'shipping'
            ? 'shipping_voucher'
            : 'order_voucher';
        session()->forget($key);
        session()->forget('voucher');

        return redirect()->route('checkout.show')->with('voucher_success', 'Đã bỏ mã voucher.');
    }

    public function claimVoucher($id)
    {
        $voucher = Voucher::whereKey($id)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', today());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', today());
            })
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->firstOrFail();

        $payload = [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'name' => $voucher->name,
            'discount_type' => $voucher->discount_type,
            'discount_value' => $voucher->discount_value,
            'max_discount' => $voucher->max_discount,
            'min_order' => $voucher->min_order,
        ];

        session()->put(
            $voucher->discount_type === 'free_shipping' ? 'shipping_voucher' : 'order_voucher',
            $payload
        );

        return redirect()->route('checkout.show')->with('voucher_success', 'Đã lấy voucher ' . $voucher->code . '.');
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
            'district' => 'required|string|max:255',
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

        $discountAmount = 0;
        $shippingVoucher = $this->voucherFromSession('shipping_voucher');
        $orderVoucher = $this->voucherFromSession('order_voucher');

        if ($orderVoucher) {
            if (($orderVoucher->min_order ?? 0) > $totalPrice) {
                return back()->with('error', 'Đơn hàng chưa đạt giá trị tối thiểu để dùng voucher.')->withInput();
            }

            if ($orderVoucher->discount_type === 'percent') {
                $discountAmount = round($totalPrice * ((float) $orderVoucher->discount_value / 100), 2);
                if (!empty($orderVoucher->max_discount) && $discountAmount > (float) $orderVoucher->max_discount) {
                    $discountAmount = (float) $orderVoucher->max_discount;
                }
            } else {
                $discountAmount = min((float) $orderVoucher->discount_value, $totalPrice);
            }


            // Làm tròn
            $discountAmount = round($discountAmount);
        }

        $shippingFee = $this->calculateShippingFee($request->city, $request->ward, $shippingVoucher);
        $finalTotal = max(0, $totalPrice + $shippingFee - $discountAmount);
        $addressParts = array_filter([
            trim($request->address_detail),
            trim($request->ward),
            trim($request->district),
            trim($request->city),
        ]);
        $address = implode(', ', $addressParts);

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
                'voucher_code' => collect([$shippingVoucher?->code, $orderVoucher?->code])->filter()->implode(', '),
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

            $shippingVoucher?->increment('used_quantity');
            $orderVoucher?->increment('used_quantity');


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

        session()->forget('cart');
        session()->forget('voucher');
        session()->forget('shipping_voucher');
        session()->forget('order_voucher');

        return back()
            ->with(
                'error',
                'Phương thức thanh toán không hợp lệ.'
            );
    }

    protected function voucherFromSession(string $key): ?Voucher
    {
        $payload = session($key);

        if (!$payload || empty($payload['id'])) {
            return null;
        }

        $voucher = Voucher::whereKey($payload['id'])
            ->where('code', $payload['code'] ?? '')
            ->where('status', 1)
            ->first();

        if (!$voucher || ($voucher->quantity !== null && $voucher->used_quantity >= $voucher->quantity)
            || ($voucher->start_date && now()->toDateString() < $voucher->start_date)
            || ($voucher->end_date && now()->toDateString() > $voucher->end_date)) {
            session()->forget($key);

                    $customerId = session('customer.id');
                    if ($customerId && Schema::hasTable('nguoidung')) {
                        $customerData = [
                            'address' => $address,
                            'tel' => $request->phone,
                        ];

                        if (Schema::hasColumn('nguoidung', 'city')) {
                            $customerData['city'] = $request->city;
                        }
                        if (Schema::hasColumn('nguoidung', 'ward')) {
                            $customerData['ward'] = $request->ward;
                        }
                        if (Schema::hasColumn('nguoidung', 'address_detail')) {
                            $customerData['address_detail'] = $request->address_detail;
                        }
                        if (Schema::hasColumn('nguoidung', 'updated_at')) {
                            $customerData['updated_at'] = now();
                        }

                        DB::table('nguoidung')->where('id', $customerId)->update($customerData);
                        session()->put('customer.address', $address);
                        session()->put('customer.tel', $request->phone);
                        session()->put('customer.city', $request->city);
                        session()->put('customer.ward', $request->ward);
                        session()->put('customer.address_detail', $request->address_detail);
                    }
            return null;
        }

        return $voucher;
    }
}
