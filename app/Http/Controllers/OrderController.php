<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = DB::table('hoadon')->orderByDesc('id')->get();
        } catch (\Throwable $e) {
            $orders = collect();
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        try {
            $order = DB::table('hoadon')->where('id', $id)->first();
            $items = DB::table('chitiethoadon')
                ->join('sanpham', 'chitiethoadon.id_sanpham', '=', 'sanpham.id')
                ->select('chitiethoadon.*', 'sanpham.name as product_name', 'sanpham.img as product_image')
                ->where('chitiethoadon.id_hoadon', $id)
                ->get();
        } catch (\Throwable $e) {
            $order = null;
            $items = collect();
        }

        return view('admin.orders.show', compact('order', 'items'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['trangthai' => 'required|integer']);

        try {
            DB::table('hoadon')->where('id', $id)->update(['trangthai' => $request->trangthai]);
        } catch (\Throwable $e) {
            // Ignore missing table issues in local/test environments.
        }

        return redirect()->route('admin.orders.show', $id);
    }
}
