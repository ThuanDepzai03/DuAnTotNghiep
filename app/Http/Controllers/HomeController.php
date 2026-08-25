<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Voucher;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        // 1. Lấy danh sách danh mục
        $danhmuc = DB::table('categories')
            ->where('status', 1)
            ->get();

        // 2. Lấy danh sách sản phẩm
        $query = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.*',
                'categories.name as category_name'
            )
            ->where('products.status', 1);

        // Lọc theo danh mục
        if ($request->has('iddm') && $request->iddm != 'all') {
            $query->where('products.category_id', $request->iddm);
        }

        // Lấy 8 sản phẩm mới nhất
        $newProducts = $query
            ->orderBy('products.id', 'desc')
            ->limit(8)
            ->get();

        // 3. Voucher Flash Sale đang hoạt động
        $flashSaleVouchers = Voucher::where('voucher_type', 'flash_sale')
            ->where('status', 1)
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
            ->orderBy('id', 'desc')
            ->get();

        // 4. Voucher Trung Thu đang hoạt động
        $midAutumnVouchers = Voucher::where('voucher_type', 'mid_autumn')
            ->where('status', 1)
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
            ->orderBy('id', 'desc')
            ->get();

        // 5. Chuyển sang mảng để tương thích giao diện cũ
        $danhmuc = json_decode(json_encode($danhmuc), true);
        $newProducts = json_decode(json_encode($newProducts), true);

        // 6. Gửi dữ liệu sang home.blade.php
        return view('home', compact(
            'danhmuc',
            'newProducts',
            'flashSaleVouchers',
            'midAutumnVouchers'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function flashVoucher()
    {
        $flashVouchers = Voucher::where('voucher_type', 'flash_sale')
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', now());
            })->latest()->get();

        $eventVouchers = Voucher::where('voucher_type', 'mid_autumn')
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('quantity')->orWhereColumn('used_quantity', '<', 'quantity');
            })
            ->where(function ($query) {
                $query->whereNull('start_date')->orWhereDate('start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')->orWhereDate('end_date', '>=', now());
            })->latest()->get();

        return view('client.flash-voucher', compact('flashVouchers', 'eventVouchers'));
    }

    public function contact()
    {
        return view('contact');
    }
}
