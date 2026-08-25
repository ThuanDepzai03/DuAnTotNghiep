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

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::active()
            ->orderBy('position')
            ->latest()
            ->get();

        $heroBanners = $banners->where('type', 'hero')->values();
        $staticFullBanners = $banners->where('type', 'static_full')->values();
        $staticRectBanners = $banners->where('type', 'static_rect')->values();

        $categories = Category::where('status', 1)->get();

        $brands = Brand::where('status', 1)->get();

        $query = Product::with([
            'category',
            'brand',
            'variants',
        ])->where('status', 1);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()
            ->take(12)
            ->get();

        $activeVoucherQuery = fn ($type) => Voucher::where('voucher_type', $type)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', today());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', today());
            })
            ->latest();

        $flashVouchers = $activeVoucherQuery('flash_sale')->get();
        $eventVouchers = $activeVoucherQuery('mid_autumn')->get();

        return view('client.home', compact(
            'banners',
            'heroBanners',
            'staticFullBanners',
            'staticRectBanners',
            'categories',
            'brands',
            'products',
            'flashVouchers',
            'eventVouchers'
        ));
    }
    public function flashVoucher()
    {
        $activeVoucherQuery = fn ($type) => Voucher::where('voucher_type', $type)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', today());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', today());
            })->latest();

        return view('client.flash-voucher', [
            'flashVouchers' => $activeVoucherQuery('flash_sale')->get(),
            'eventVouchers' => $activeVoucherQuery('mid_autumn')->get(),
        ]);
    }

    public function about()
    {
        return view('client.about');
    }

    public function news()
    {
        return view('client.news');
    }

public function contact()
{
    return view('client.contact');
}

    public function vouchers()
    {
        $vouchers = Voucher::where('status', 1)
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', today());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', today());
            })
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->latest()
            ->get();

        return view('client.vouchers', compact('vouchers'));
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Contact::create($data + ['status' => 'new']);

        return back()->with('success', 'Đã gửi yêu cầu. Cửa hàng sẽ phản hồi sớm nhất.');
    }
}
