<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $categories = Category::where('status', 1)->get();
    $brands = Brand::where('status', 1)->get();

    $query = Product::with([
        'category',
        'brand',
        'variants',
    ])->where('status', 1);

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('brand_id')) {
        $query->where('brand_id', $request->brand_id);
    }

    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('min_price') || $request->filled('max_price')) {
        $query->whereHas('variants', function ($variantQuery) use ($request) {
            $variantQuery->where('status', 1);

            if ($request->filled('min_price')) {
                $variantQuery->whereRaw(
                    'COALESCE(sale_price, price) >= ?',
                    [(float) $request->min_price]
                );
            }

            if ($request->filled('max_price')) {
                $variantQuery->whereRaw(
                    'COALESCE(sale_price, price) <= ?',
                    [(float) $request->max_price]
                );
            }
        });
    }

    $products = $query
        ->latest()
        ->paginate(12)
        ->withQueryString();

    return view('client.shop', compact(
        'products',
        'categories',
        'brands'
    ));
}

   public function show($id)
{
    $product = Product::with([
        'category',
        'brand',
        'variants.attributeValues.attribute',
    ])
        ->where('status', 1)
        ->findOrFail($id);

    $variants = $product->variants
        ->where('status', 1)
        ->values();

    // Gom các giá trị biến thể theo từng thuộc tính: Màu sắc, RAM, Bộ nhớ...
    $attributeGroups = $variants
        ->flatMap(function ($variant) {
            return $variant->attributeValues;
        })
        ->groupBy('attribute_id')
        ->map(function ($values) {
            $firstValue = $values->first();

            return [
                'id' => $firstValue->attribute_id,
                'name' => $firstValue->attribute?->name ?? 'Thuộc tính',
                'values' => $values
                    ->unique('id')
                    ->values()
                    ->map(function ($value) {
                        return [
                            'id' => $value->id,
                            'value' => $value->value,
                        ];
                    }),
            ];
        })
        ->values();

    // Chuyển biến thể sang dữ liệu JavaScript để chọn đúng tổ hợp
    $variantData = $variants->map(function ($variant) use ($product) {
        return [
            'id' => $variant->id,
            'sku' => $variant->sku,
            'price' => (float) $variant->price,
            'sale_price' => $variant->sale_price ? (float) $variant->sale_price : null,
            'final_price' => (float) ($variant->sale_price ?? $variant->price),
            'stock' => (int) $variant->stock,
            'image' => asset(
                $variant->image
                    ?? $product->thumbnail
                    ?? 'img/product01.png'
            ),
            'attribute_value_ids' => $variant->attributeValues
                ->pluck('id')
                ->map(fn ($id) => (int) $id)
                ->values(),
        ];
    })->values();

    $relatedProducts = Product::with('variants')
        ->where('status', 1)
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

    return view('client.detail', compact(
        'product',
        'variants',
        'attributeGroups',
        'variantData',
        'relatedProducts'
    ));
}
}
