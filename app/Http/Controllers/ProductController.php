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

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'category',
            'brand',
            'variants',
        ])
            ->latest()
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        $brands = Brand::where('status', 1)
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],

            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:100', 'unique:products,sku'],
            'description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],

            'variant_sku' => ['required', 'string', 'max:100', 'unique:product_variants,sku'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'variant_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',

            'name.required' => 'Vui lòng nhập tên sản phẩm.',

            'variant_sku.required' => 'Vui lòng nhập mã biến thể.',
            'variant_sku.unique' => 'Mã biến thể đã tồn tại.',

            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'sale_price.lte' => 'Giá khuyến mãi phải nhỏ hơn hoặc bằng giá gốc.',
            'stock.required' => 'Vui lòng nhập số lượng tồn kho.',
        ]);

        DB::transaction(function () use ($request, $data) {
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
                'sku' => $data['sku'] ?? null,
                'description' => $data['description'] ?? null,
                'thumbnail' => $thumbnailPath,
                'status' => (int) $data['status'],
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'sku' => $data['variant_sku'],
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $variantImagePath ?? $thumbnailPath,
                'status' => (int) $data['status'],
            ]);
        });

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

        return view(
            'admin.products.edit',
            compact('product', 'categories', 'brands', 'firstVariant')
        );
    }

    public function update(Request $request, Product $product)
    {
        $firstVariant = $product->variants()->first();

        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],

            'name' => ['required', 'string', 'max:255'],
            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],

            'variant_sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('product_variants', 'sku')->ignore($firstVariant?->id),
            ],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'variant_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($request, $product, $firstVariant, $data) {
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
                'sku' => $data['sku'] ?? null,
                'description' => $data['description'] ?? null,
                'thumbnail' => $thumbnailPath,
                'status' => (int) $data['status'],
            ]);

            if ($firstVariant) {
                $firstVariant->update([
                    'sku' => $data['variant_sku'],
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'] ?? null,
                    'stock' => $data['stock'],
                    'image' => $variantImagePath ?? $thumbnailPath,
                    'status' => (int) $data['status'],
                ]);
            } else {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $data['variant_sku'],
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'] ?? null,
                    'stock' => $data['stock'],
                    'image' => $variantImagePath ?? $thumbnailPath,
                    'status' => (int) $data['status'],
                ]);
            }
        });

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

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Khôi phục sản phẩm thành công.');
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
}
