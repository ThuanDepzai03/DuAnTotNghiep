<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Trang chủ
     */
    public function index(Request $request)
    {
        Log::info('HOME SESSION CHECK', [
            'session_id' => $request->session()->getId(),
            'customer' => $request->session()->get('customer'),
        ]);

        /*
        |--------------------------------------------------------------------------
        | BANNER
        |--------------------------------------------------------------------------
        */

        $banners = Banner::active()
            ->orderBy('position')
            ->latest()
            ->get();

        $heroBanners = $banners
            ->where('type', 'hero')
            ->values();

        $staticFullBanners = $banners
            ->where('type', 'static_full')
            ->values();

        $staticRectBanners = $banners
            ->where('type', 'static_rect')
            ->values();


        /*
        |--------------------------------------------------------------------------
        | CATEGORY / BRAND
        |--------------------------------------------------------------------------
        */

        $categories = Category::where('status', 1)->get();

        $brands = Brand::where('status', 1)->get();


        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        $query = Product::with([
            'category',
            'brand',
            'variants',
        ])
            ->where('status', 1);

        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->category_id
            );
        }

        $products = $query
            ->latest()
            ->take(12)
            ->get();

        $featuredProducts = Product::with([
                'category',
                'brand',
                'variants',
            ])
            ->where('status', 1)
            ->get()
            ->sortByDesc(function ($product) {
                return $product->clicks()
                    ->whereNotNull('customer_id')
                    ->select(DB::raw('COUNT(DISTINCT customer_id) as customer_click_count'))
                    ->value('customer_click_count') ?? 0;
            })
            ->values()
            ->take(8);

        foreach ($featuredProducts as $product) {
            $product->click_count = $product->clicks()
                ->whereNotNull('customer_id')
                ->select(DB::raw('COUNT(DISTINCT customer_id) as customer_click_count'))
                ->value('customer_click_count') ?? 0;
        }


        /*
        |--------------------------------------------------------------------------
        | FLASH SALE
        |--------------------------------------------------------------------------
        |
        | Chỉ lấy voucher Flash Sale đang hoạt động.
        |
        */

        $flashVouchers = Voucher::where(
                'voucher_type',
                'flash_sale'
            )
            ->where('status', 1)

            // Còn số lượng
            ->where(function ($query) {
                $query
                    ->whereNull('quantity')
                    ->orWhereColumn(
                        'used_quantity',
                        '<',
                        'quantity'
                    );
            })

            // Đã bắt đầu
            ->where(function ($query) {
                $query
                    ->whereNull('start_date')
                    ->orWhereDate(
                        'start_date',
                        '<=',
                        today()
                    );
            })

            // Chưa hết hạn
            ->where(function ($query) {
                $query
                    ->whereNull('end_date')
                    ->orWhereDate(
                        'end_date',
                        '>=',
                        today()
                    );
            })

            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VOUCHER TRUNG THU
        |--------------------------------------------------------------------------
        |
        | QUAN TRỌNG:
        |
        | Không lọc start_date ở đây.
        |
        | Vì cần lấy cả voucher sắp bắt đầu để:
        | - Hiện ngày sự kiện
        | - Hiện countdown
        | - Báo "Voucher sự kiện sắp được mở"
        |
        */

        $eventVouchers = Voucher::where(
                'voucher_type',
                'mid_autumn'
            )
            ->where('status', 1)

            // Còn số lượng
            ->where(function ($query) {
                $query
                    ->whereNull('quantity')
                    ->orWhereColumn(
                        'used_quantity',
                        '<',
                        'quantity'
                    );
            })

            // Ưu tiên voucher có ngày bắt đầu sớm nhất
            ->orderBy('start_date')

            // Nếu cùng ngày thì lấy ID mới nhất
            ->latest('id')

            ->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'client.home',
            compact(
                'banners',
                'heroBanners',
                'staticFullBanners',
                'staticRectBanners',
                'categories',
                'brands',
                'products',
                'featuredProducts',
                'flashVouchers',
                'eventVouchers'
            )
        );
    }


    /**
     * Trang Flash Voucher
     */
    public function flashVoucher()
    {
        /*
        |--------------------------------------------------------------------------
        | FLASH SALE
        |--------------------------------------------------------------------------
        */

        $flashVouchers = Voucher::where(
                'voucher_type',
                'flash_sale'
            )
            ->where('status', 1)

            ->where(function ($query) {
                $query
                    ->whereNull('quantity')
                    ->orWhereColumn(
                        'used_quantity',
                        '<',
                        'quantity'
                    );
            })

            ->where(function ($query) {
                $query
                    ->whereNull('start_date')
                    ->orWhereDate(
                        'start_date',
                        '<=',
                        today()
                    );
            })

            ->where(function ($query) {
                $query
                    ->whereNull('end_date')
                    ->orWhereDate(
                        'end_date',
                        '>=',
                        today()
                    );
            })

            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VOUCHER TRUNG THU
        |--------------------------------------------------------------------------
        |
        | Không lọc start_date.
        |
        | Để trang có thể hiển thị:
        | BẮT ĐẦU TRONG
        | hoặc
        | KẾT THÚC TRONG
        |
        */

        $eventVouchers = Voucher::where(
                'voucher_type',
                'mid_autumn'
            )
            ->where('status', 1)

            ->where(function ($query) {
                $query
                    ->whereNull('quantity')
                    ->orWhereColumn(
                        'used_quantity',
                        '<',
                        'quantity'
                    );
            })

            ->orderBy('start_date')
            ->latest('id')
            ->get();


        return view(
            'client.flash-voucher',
            [
                'flashVouchers' => $flashVouchers,
                'eventVouchers' => $eventVouchers,
            ]
        );
    }


    /**
     * Giới thiệu
     */
    public function about()
    {
        return view('client.about');
    }


    /**
     * Tin tức
     */
    public function news()
    {
        return view('client.news');
    }


    /**
     * Liên hệ
     */
    public function contact()
    {
        return view('client.contact');
    }


    /**
     * Danh sách voucher
     */
    public function vouchers()
    {
        $vouchers = Voucher::where('status', 1)

            ->where(function ($query) {
                $query
                    ->whereNull('start_date')
                    ->orWhereDate(
                        'start_date',
                        '<=',
                        today()
                    );
            })

            ->where(function ($query) {
                $query
                    ->whereNull('end_date')
                    ->orWhereDate(
                        'end_date',
                        '>=',
                        today()
                    );
            })

            ->where(function ($query) {
                $query
                    ->whereNull('quantity')
                    ->orWhereColumn(
                        'used_quantity',
                        '<',
                        'quantity'
                    );
            })

            ->latest()
            ->get();

        return view(
            'client.vouchers',
            compact('vouchers')
        );
    }


    /**
     * Gửi liên hệ
     */
    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255'
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20'
            ],

            'subject' => [
                'nullable',
                'string',
                'max:255'
            ],

            'message' => [
                'required',
                'string',
                'max:2000'
            ],
        ]);

        Contact::create(
            $data + [
                'status' => 'new'
            ]
        );

        return back()->with(
            'success',
            'Đã gửi yêu cầu. Cửa hàng sẽ phản hồi sớm nhất.'
        );
    }


    /**
     * API tìm kiếm gợi ý sản phẩm
     */
    public function searchSuggestion(Request $request)
    {
        $keyword = $request->query('keyword', '');

        // Nếu keyword trống, trả về danh sách rỗng
        if (empty(trim($keyword))) {
            return response()->json([]);
        }

        // Tìm kiếm sản phẩm theo tên hoặc SKU với ưu tiên những cái bắt đầu bằng keyword
        $products = Product::where('status', 1)
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . $keyword . '%');
            })
            ->orderByRaw("CASE
                WHEN name LIKE ? THEN 0
                WHEN name LIKE ? THEN 1
                WHEN sku LIKE ? THEN 2
                WHEN sku LIKE ? THEN 3
                ELSE 4
            END", [$keyword . '%', '%' . $keyword . '%', $keyword . '%', '%' . $keyword . '%'])
            ->with('category', 'brand', 'variants')
            ->limit(8)
            ->get()
            ->map(function ($product) {
                $price = $product->variants->first()?->price ?? $product->variants->first()?->sale_price ?? 0;
                $image = $product->thumbnail ?? 'img/product01.png';

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => asset($image),
                    'price' => $price,
                    'url' => route('product.detail', ['id' => $product->id]),
                ];
            });

        return response()->json($products);
    }
}
