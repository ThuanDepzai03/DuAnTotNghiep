<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Gọi class DB để lấy dữ liệu từ phpMyAdmin

class HomeController extends Controller
{
    // Hàm xử lý trang chủ
    public function home(Request $request)
    {
        // 1. Lấy danh sách danh mục từ database
        $danhmuc = DB::table('danhmuc')->where('deleted', 0)->get();

        // 2. Lấy danh sách sản phẩm (Có join với bảng danh mục để lấy tên danh mục)
        $query = DB::table('sanpham')
            ->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
            ->select('sanpham.*', 'danhmuc.name as category_name')
            ->where('sanpham.deleted', 0);

        // Nếu người dùng có click lọc theo danh mục
        if ($request->has('iddm') && $request->iddm != 'all') {
            $query->where('sanpham.iddm', $request->iddm);
        }

        // Lấy 8 sản phẩm mới nhất
        $newProducts = $query->orderBy('sanpham.id', 'desc')->limit(8)->get();

        // 3. Chuyển đổi dữ liệu sang dạng Mảng (Array) để tương thích 100% với giao diện cũ
        $danhmuc = json_decode(json_encode($danhmuc), true);
        $newProducts = json_decode(json_encode($newProducts), true);

        // 4. Trả về file home.blade.php kèm theo dữ liệu
        return view('home', compact('danhmuc', 'newProducts'));
    }

    // Hàm xử lý trang Giới Thiệu
    public function about()
    {
        return view('about');
    }

    // Hàm xử lý trang Liên Hệ
    public function contact()
    {
        return view('contact');
    }
    
    
    
    
}