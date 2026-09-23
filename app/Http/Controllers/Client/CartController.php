<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCartItems();

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
            return $this->cartAddResponse($request, false, 'Sản phẩm hiện không khả dụng.', 422);
        }

        if ($variant->stock < 1) {
            return $this->cartAddResponse($request, false, 'Biến thể này hiện đã hết hàng.', 422);
        }

        $cart = $this->getCartItems();
        $variantId = (string) $variant->id;

        $currentQuantity = $cart[$variantId]['quantity'] ?? 0;

        if (($currentQuantity + $quantity) > $variant->stock) {
            return $this->cartAddResponse(
                $request,
                false,
                'Số lượng vượt quá tồn kho. Hiện còn ' . $variant->stock . ' sản phẩm.',
                422
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

        $this->saveCartItems($cart);

        $totalQuantity = collect($cart)->sum('quantity');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng.',
                'totalQuantity' => $totalQuantity,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }

    private function cartAddResponse(Request $request, bool $success, string $message, int $status)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => $success,
                'message' => $message,
            ], $status);
        }

        return back()->with('error', $message);
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantities' => ['required', 'array'],
            'quantities.*' => ['nullable', 'integer', 'min:0'],
        ]);

        $cart = $this->getCartItems();
        $variantIds = array_keys($request->quantities);

        $variants = ProductVariant::with('product')->whereIn('id', $variantIds)
            ->where('status', 1)
            ->whereHas('product', fn ($query) => $query->where('status', 1))
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

        $this->saveCartItems($cart);

        $totalQuantity = collect($cart)->sum('quantity');
        $totalPrice = collect($cart)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        });

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật giỏ hàng.',
                'totalQuantity' => $totalQuantity,
                'totalPrice' => (float) $totalPrice,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã cập nhật giỏ hàng.');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_variant_id' => ['required', 'integer'],
        ]);

        $cart = $this->getCartItems();

        unset($cart[(string) $request->product_variant_id]);

        $this->saveCartItems($cart);

        $totalQuantity = collect($cart)->sum('quantity');
        $totalPrice = collect($cart)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        });

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.',
                'totalQuantity' => $totalQuantity,
                'totalPrice' => (float) $totalPrice,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }
}
