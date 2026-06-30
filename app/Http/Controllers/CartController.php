<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index() {
        return view('cart'); // Trả về file cart.blade.php
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
}