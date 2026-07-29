<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariant;
class CartController extends Controller
{
    public function index() {
        $customer = session('customer');

        if (!$customer || (int) $customer['role'] !== 0) {
            return redirect()->route('login');
        }

        return view('cart');
    }

    public function add(Request $request)
{
    $variantId = $request->product_variant_id;

    $variant = ProductVariant::with('product')->findOrFail($variantId);

    $cart = session()->get('cart', []);

    if (isset($cart[$variantId])) {
        $cart[$variantId]['quantity']++;
    } else {
                $cart[$variantId] = [
            'variant_id' => $variant->id,
            'name' => $variant->product->name ?? 'Sản phẩm',
            'price' => $variant->sale_price ?? $variant->price,
            'image' => $variant->image,
            'quantity' => 1,
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