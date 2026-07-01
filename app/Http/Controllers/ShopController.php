<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function Shop(Request $request)
    {
        // 1. Lấy danh sách danh mục
        $danhmuc = DB::table('danhmuc')->where('deleted', 0)->get();

        // 2. Query sản phẩm cơ bản
        $query = DB::table('sanpham')
            ->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
            ->select('sanpham.*', 'danhmuc.name as category_name')
            ->where('sanpham.deleted', 0);

        // 3. Lọc theo danh mục
        if ($request->has('iddm') && $request->iddm != 0) {
            $query->where('sanpham.iddm', $request->iddm);
        }

        // 4. Lọc theo giá
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('sanpham.price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('sanpham.price', '<=', $request->max_price);
        }

        $newProducts = $query->orderBy('sanpham.id', 'desc')->paginate(9);

        // Chuyển sang array để khớp với view cũ của bạn
        $newProductsArray = json_decode(json_encode($newProducts->items()), true);
        $danhmucArray = json_decode(json_encode($danhmuc), true);

        return view('shop', [
            'danhmuc' => $danhmucArray,
            'newProducts' => $newProductsArray,
            'pagination' => $newProducts // Giữ lại object phân trang nếu sau này bạn muốn làm nút Next/Prev
        ]);
    }
}