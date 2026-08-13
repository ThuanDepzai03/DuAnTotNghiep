<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function Shop(Request $request)
    {
        // 1. Lấy danh sách danh mục
        $danhmuc = DB::table('categories')
            ->where('status', 1)
            ->get();

        // 2. Query sản phẩm cơ bản
        $query = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.*',
                'categories.name as category_name'
            )
            ->where('products.status', 1);

        // 3. Lọc theo danh mục
        if ($request->has('iddm') && $request->iddm != 0) {
            $query->where('products.category_id', $request->iddm);
        }

        // 4. Lọc theo giá
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('products.category_id', $request->iddm);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('products.category_id', $request->iddm);
        }

        $newProducts = $query
            ->orderBy('products.id', 'desc')
            ->paginate(9);

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
