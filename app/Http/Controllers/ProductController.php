<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function detail($id)
    {
        // Lấy chi tiết 1 sản phẩm theo ID
        $product = DB::table('sanpham')
            ->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
            ->select('sanpham.*', 'danhmuc.name as category_name')
            ->where('sanpham.id', $id)
            ->first();

        if (!$product) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Chuyển object sang array
        $productArray = (array) $product;

        return view('detail', ['product' => $productArray]);
    }
}