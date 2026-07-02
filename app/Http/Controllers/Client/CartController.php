<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $totalQuantity = collect($cart)->sum('quantity');

        $totalPrice = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('client.cart', compact(
            'cart',
            'totalQuantity',
            'totalPrice'
        ));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);

        $quantity = $request->input('quantity', 1);

        $variant = ProductVariant::with([
            'product',
            'attributeValues.attribute',
        ])
            ->where('status', 1)
            ->findOrFail($request->product_variant_id);

        if (!$variant->product || $variant->product->status != 1) {
            return back()->with('error', 'Sản phẩm hiện không khả dụng.');
        }

        if ($variant->stock < 1) {
            return back()->with('error', 'Biến thể này hiện đã hết hàng.');
        }

        $cart = session()->get('cart', []);
        $variantId = (string) $variant->id;

        $currentQuantity = $cart[$variantId]['quantity'] ?? 0;

        if (($currentQuantity + $quantity) > $variant->stock) {
            return back()->with(
                'error',
                'Số lượng vượt quá tồn kho. Hiện còn ' . $variant->stock . ' sản phẩm.'
            );
        }

        $attributeText = $variant->attributeValues
            ->map(function ($attributeValue) {
                $attributeName = $attributeValue->attribute?->name ?? '';
                return $attributeName . ': ' . $attributeValue->value;
            })
            ->implode(' | ');

        $price = $variant->sale_price ?? $variant->price;

        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity'] += $quantity;
        } else {
            $cart[$variantId] = [
                'variant_id' => $variant->id,
                'product_id' => $variant->product->id,
                'name' => $variant->product->name,
                'sku' => $variant->sku,
                'attributes' => $attributeText,
                'image' => $variant->image ?? $variant->product->thumbnail,
                'price' => (float) $price,
                'old_price' => $variant->sale_price ? (float) $variant->price : null,
                'stock' => $variant->stock,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantities' => ['required', 'array'],
            'quantities.*' => ['nullable', 'integer', 'min:0'],
        ]);

        $cart = session()->get('cart', []);
        $variantIds = array_keys($request->quantities);

        $variants = ProductVariant::whereIn('id', $variantIds)
            ->get()
            ->keyBy('id');

        foreach ($request->quantities as $variantId => $quantity) {
            if (!isset($cart[$variantId])) {
                continue;
            }

            $quantity = (int) $quantity;

            if ($quantity <= 0) {
                unset($cart[$variantId]);
                continue;
            }

            $variant = $variants->get((int) $variantId);

            if (!$variant || $variant->stock < 1) {
                unset($cart[$variantId]);
                continue;
            }

            $cart[$variantId]['quantity'] = min($quantity, $variant->stock);
            $cart[$variantId]['stock'] = $variant->stock;
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã cập nhật giỏ hàng.');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_variant_id' => ['required', 'integer'],
        ]);

        $cart = session()->get('cart', []);

        unset($cart[(string) $request->product_variant_id]);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }
}
