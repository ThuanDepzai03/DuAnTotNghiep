<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Attribute;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $categories = Category::where('status', 1)
        ->orderBy('name')
        ->get();

    $brands = Brand::where('status', 1)
        ->orderBy('name')
        ->get();

    // Lấy các cấu hình có trong database
    $attributes = Attribute::with('values')
        ->whereIn('name', ['Màu sắc', 'RAM', 'Bộ nhớ'])
        ->get()
        ->keyBy('name');

    $colors = $attributes->get('Màu sắc')?->values ?? collect();
    $rams = $attributes->get('RAM')?->values ?? collect();
    $storages = $attributes->get('Bộ nhớ')?->values ?? collect();

    // Các giá trị người dùng đã chọn
    $selectedColors = collect((array) $request->input('colors', []))
        ->filter()
        ->map(fn ($id) => (int) $id)
        ->values()
        ->all();

    $selectedRams = collect((array) $request->input('rams', []))
        ->filter()
        ->map(fn ($id) => (int) $id)
        ->values()
        ->all();

    $selectedStorages = collect((array) $request->input('storages', []))
        ->filter()
        ->map(fn ($id) => (int) $id)
        ->values()
        ->all();

    $minPrice = $request->filled('min_price')
        ? (float) $request->min_price
        : null;

    $maxPrice = $request->filled('max_price')
        ? (float) $request->max_price
        : null;

    $query = Product::with(['category', 'brand', 'variants'])
        ->where('status', 1);

    // Tìm kiếm tên sản phẩm
    if ($request->filled('keyword')) {
        $keyword = trim($request->keyword);

        $query->where('name', 'like', '%' . $keyword . '%');
    }

    // Lọc danh mục
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // Lọc thương hiệu
    if ($request->filled('brand_id')) {
        $query->where('brand_id', $request->brand_id);
    }

    /*
     * Giá + cấu hình đều kiểm tra trên CÙNG một biến thể.
     * Ví dụ chọn Đen + 8GB + 256GB thì phải có đúng biến thể đó.
     */
    $hasVariantFilter =
        $minPrice !== null ||
        $maxPrice !== null ||
        !empty($selectedColors) ||
        !empty($selectedRams) ||
        !empty($selectedStorages);

    if ($hasVariantFilter) {
        $query->whereHas('variants', function ($variantQuery) use (
            $minPrice,
            $maxPrice,
            $selectedColors,
            $selectedRams,
            $selectedStorages
        ) {
            $variantQuery->where('status', 1);

            if ($minPrice !== null) {
                $variantQuery->whereRaw(
                    'COALESCE(sale_price, price) >= ?',
                    [$minPrice]
                );
            }

            if ($maxPrice !== null) {
                $variantQuery->whereRaw(
                    'COALESCE(sale_price, price) <= ?',
                    [$maxPrice]
                );
            }

            if (!empty($selectedColors)) {
                $variantQuery->whereHas('attributeValues', function ($valueQuery) use ($selectedColors) {
                    $valueQuery
                        ->whereIn('attribute_values.id', $selectedColors)
                        ->whereHas('attribute', function ($attributeQuery) {
                            $attributeQuery->where('name', 'Màu sắc');
                        });
                });
            }

            if (!empty($selectedRams)) {
                $variantQuery->whereHas('attributeValues', function ($valueQuery) use ($selectedRams) {
                    $valueQuery
                        ->whereIn('attribute_values.id', $selectedRams)
                        ->whereHas('attribute', function ($attributeQuery) {
                            $attributeQuery->where('name', 'RAM');
                        });
                });
            }

            if (!empty($selectedStorages)) {
                $variantQuery->whereHas('attributeValues', function ($valueQuery) use ($selectedStorages) {
                    $valueQuery
                        ->whereIn('attribute_values.id', $selectedStorages)
                        ->whereHas('attribute', function ($attributeQuery) {
                            $attributeQuery->where('name', 'Bộ nhớ');
                        });
                });
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
        'brands',
        'colors',
        'rams',
        'storages',
        'selectedColors',
        'selectedRams',
        'selectedStorages'
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
