<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Attribute;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with([
            'category',
            'brand',
            'variants',
        ]);

        if ($request->filled('id')) {
            $query->where('id', $request->integer('id'));
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->integer('brand_id'));
        }

        match ($request->input('price')) {
            'low_to_high' => $query->withMin('variants', 'sale_price')->orderBy('variants_min_sale_price'),
            'high_to_low' => $query->withMin('variants', 'sale_price')->orderByDesc('variants_min_sale_price'),
            default => $query->latest(),
        };

        $products = $query->get();
        $brands = Brand::where('status', 1)->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'brands'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        $brands = Brand::where('status', 1)
            ->orderBy('name')
            ->get();

        $attributes = Attribute::with('values')
            ->orderBy('id')
            ->get();

        return view('admin.products.form', compact(
            'categories',
            'brands',
            'attributes'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],
            'attribute_value_ids' => ['nullable', 'array'],
            'attribute_value_ids.*' => ['nullable', 'integer', 'exists:attribute_values,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],

            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'variant_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',

            'name.required' => 'Vui lòng nhập tên sản phẩm.',

            // SKUs are generated automatically and not editable by user

            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'sale_price.lte' => 'Giá khuyến mãi phải nhỏ hơn hoặc bằng giá gốc.',
            'stock.required' => 'Vui lòng nhập số lượng tồn kho.',
        ]);
        $attributeValueIds = collect($data['attribute_value_ids'] ?? [])
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

       DB::transaction(function () use ($request, $data, $attributeValueIds) {
            $thumbnailPath = null;
            $variantImagePath = null;

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $this->uploadImage(
                    $request->file('thumbnail'),
                    'products'
                );
            }

            if ($request->hasFile('variant_image')) {
                $variantImagePath = $this->uploadImage(
                    $request->file('variant_image'),
                    'variants'
                );
            }

            $product = Product::create([
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'] ?? null,
                'name' => trim($data['name']),
                'slug' => $this->makeUniqueSlug($data['name']),
                'sku' => $this->generateProductSku($data['name']),
                'description' => $data['description'] ?? null,
                'thumbnail' => $thumbnailPath,
                'status' => (int) $data['status'],
            ]);

            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'sku' => $this->generateVariantSku($product, $attributeValueIds),
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $variantImagePath ?? $thumbnailPath,
                'status' => (int) $data['status'],
            ]);
            $variant->attributeValues()->sync($attributeValueIds);
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Thêm sản phẩm thành công.');
    }

    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product->id);
    }

    public function edit(Product $product)
    {
        $product->load(['variants', 'category', 'brand']);

        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        $brands = Brand::where('status', 1)
            ->orderBy('name')
            ->get();

        $firstVariant = $product->variants->first();

        $attributes = Attribute::with('values')
            ->orderBy('id')
            ->get();

        $selectedAttributeValueIds = $firstVariant
            ? $firstVariant->attributeValues()
                ->pluck('attribute_values.id')
                ->all()
            : [];

        return view('admin.products.form', compact(
            'product',
            'categories',
            'brands',
            'firstVariant',
            'attributes',
            'selectedAttributeValueIds'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $firstVariant = $product->variants()->first();

        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],

            'attribute_value_ids' => ['nullable', 'array'],
            'attribute_value_ids.*' => ['nullable', 'integer', 'exists:attribute_values,id'],

            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],

            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'variant_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $attributeValueIds = collect($data['attribute_value_ids'] ?? [])
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        DB::transaction(function () use (
                $request,
                $product,
                $firstVariant,
                $data,
                $attributeValueIds) {
            $thumbnailPath = $product->thumbnail;
            $variantImagePath = $firstVariant?->image;

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $this->uploadImage(
                    $request->file('thumbnail'),
                    'products'
                );
            }

            if ($request->hasFile('variant_image')) {
                $variantImagePath = $this->uploadImage(
                    $request->file('variant_image'),
                    'variants'
                );
            }

            $product->update([
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'] ?? null,
                'name' => trim($data['name']),
                'slug' => $this->makeUniqueSlug($data['name'], $product->id),
                'description' => $data['description'] ?? null,
                'thumbnail' => $thumbnailPath,
                'status' => (int) $data['status'],
            ]);

            if ($firstVariant) {
                $firstVariant->update([
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'] ?? null,
                    'stock' => $data['stock'],
                    'image' => $variantImagePath ?? $thumbnailPath,
                    'status' => (int) $data['status'],
                ]);

                $variant = $firstVariant;
            } else {
                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $this->generateVariantSku($product, $attributeValueIds),
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'] ?? null,
                    'stock' => $data['stock'],
                    'image' => $variantImagePath ?? $thumbnailPath,
                    'status' => (int) $data['status'],
                ]);
            }

            $variant->attributeValues()->sync($attributeValueIds);
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công.');
    }

    // Ẩn sản phẩm, không xóa dữ liệu
    public function destroy(Product $product)
    {
        $product->update([
            'status' => 0,
        ]);

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Đã ẩn sản phẩm.');
    }

    public function restore($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'status' => 1,
        ]);

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Khôi phục sản phẩm thành công.');
    }

    public function uploadDescriptionImage(Request $request)
    {
        $request->validate([
            'upload' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $folder = public_path('image/products/description');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $file = $request->file('upload');
        $fileName = time() . '-' . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $fileName);

        $url = asset('image/products/description/' . $fileName);

        return response()->json([
            'uploaded' => true,
            'url' => $url,
        ]);
    }

    private function makeUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name) ?: 'san-pham';
        $slug = $baseSlug;
        $number = 2;

        while (true) {
            $query = Product::where('slug', $slug);

            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            if (!$query->exists()) {
                return $slug;
            }

            $slug = $baseSlug . '-' . $number;
            $number++;
        }
    }

    private function uploadImage($file, string $folder): string
    {
        $fileName = time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();

        $file->move(
            public_path('image/' . $folder),
            $fileName
        );

        return 'image/' . $folder . '/' . $fileName;
    }

    private function generateProductSku(string $name): string
    {
        $base = strtoupper(Str::slug($name, '')) ?: 'PR';

        do {
            $suffix = strtoupper(Str::random(4));
            $sku = $base . '-' . $suffix;
        } while (Product::where('sku', $sku)->exists());

        return $sku;
    }

    private function generateVariantSku(Product $product, array $attributeValueIds = []): string
    {
        $base = $product->sku ?? ('PR' . $product->id);

        do {
            $suffix = strtoupper(Str::random(4));
            $sku = $base . '-' . $suffix;
        } while (ProductVariant::where('sku', $sku)->exists());

        return $sku;
    }
}
