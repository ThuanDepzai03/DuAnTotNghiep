<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $ids = array_map('intval', session('wishlist', []));
        $products = Product::with(['category', 'variants'])
            ->where('status', 1)
            ->whereIn('id', $ids)
            ->get()
            ->sortBy(fn ($product) => array_search($product->id, $ids, true))
            ->values();

        return view('client.wishlist', compact('products'));
    }

    public function toggle(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $product = Product::where('status', 1)->findOrFail($data['product_id']);
        $wishlist = array_map('intval', session('wishlist', []));

        if (in_array($product->id, $wishlist, true)) {
            $wishlist = array_values(array_diff($wishlist, [$product->id]));
            $message = 'Đã xóa sản phẩm khỏi danh sách yêu thích.';
        } else {
            array_unshift($wishlist, $product->id);
            $wishlist = array_slice(array_values(array_unique($wishlist)), 0, 50);
            $message = 'Đã thêm sản phẩm vào danh sách yêu thích.';
        }

        session(['wishlist' => $wishlist]);

        return back()->with('success', $message);
    }
}
