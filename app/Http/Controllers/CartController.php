<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index() {
        $customer = session('customer');

        if (!$customer || (int) $customer['role'] !== 0) {
            return redirect()->route('login');
        }

        return view('cart');
    }

    public function add(Request $request) {
        $id = $request->idsp;
        $product = DB::table('sanpham')->where('id', $id)->first();
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['soLuong']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
                'soLuong' => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ!');
    }

    public function remove(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }
}