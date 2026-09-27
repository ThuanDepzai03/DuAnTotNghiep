<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\VariantAttributeValue;
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

        if ($request->filled('category_id')) {
            $category = Category::with('children')->find($request->integer('category_id'));
            $query->whereIn('category_id', collect([$category?->id])->merge($category?->children->pluck('id') ?? [])->filter());
        }

        match ($request->input('price')) {
            'low_to_high' => $query->withMin('variants', 'sale_price')->orderBy('variants_min_sale_price'),
            'high_to_low' => $query->withMin('variants', 'sale_price')->orderByDesc('variants_min_sale_price'),
            default => $query->latest(),
        };

        $products = $query->get();
        $brands = Brand::where('status', 1)->orderBy('name')->get();
        $categories = Category::where('status', 1)->with('children')->whereNull('parent_id')->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'brands', 'categories'));
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
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->unique('name')
            ->values();
        $selectedCustomAttributeValues = [];

        return view('admin.products.form', compact(
            'categories',
            'brands',
            'attributes',
            'selectedCustomAttributeValues'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],
            'attribute_value_ids' => ['nullable', 'array'],
            'attribute_value_ids.*' => ['nullable', 'integer', 'exists:attribute_values,id'],
            'attribute_custom_values' => ['nullable', 'array'],
            'attribute_custom_values.*' => ['nullable', 'string', 'max:255'],
            'product_attributes_payload' => ['nullable', 'json', 'max:50000'],
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
        $customAttributeValues = $request->input('attribute_custom_values', []);
        $productAttributeRows = $this->parseProductAttributePayload($request->input('product_attributes_payload'));
        $attributeValueIds = [];
        if ($productAttributeRows !== null) {
            $attributeValueIdsFromRows = collect($productAttributeRows)
                ->where('attribute_type', 'variation')
                ->flatMap(fn ($row) => $row['values'])
                ->unique()
                ->values()
                ->all();
            $attributeValueIds = $attributeValueIdsFromRows;
            $customAttributeValues = collect($productAttributeRows)
                ->where('attribute_type', 'information')
                ->filter(fn ($row) => $row['custom_value'] !== '')
                ->mapWithKeys(fn ($row) => [$row['attribute_id'] => $row['custom_value']])
                ->all();
        }
        if ($productAttributeRows === null) {
            $attributeValueIds = collect($data['attribute_value_ids'] ?? [])
                ->filter()
                ->map(fn ($id) => (int) $id)
                ->unique()
                ->values()
                ->all();
        }

    DB::transaction(function () use ($request, $data, $attributeValueIds, $customAttributeValues, $productAttributeRows) {
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

            if ($productAttributeRows !== null) {
                $this->syncProductAttributeRows($product, $productAttributeRows);
            } else {
                $this->syncProductAttributes($product, $attributeValueIds, $customAttributeValues);
            }

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
            $this->saveAttributeEntries($variant, $attributeValueIds, $customAttributeValues);

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
        $product->load(['variants', 'category', 'brand', 'attributes.values.attributeValue']);

        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        $brands = Brand::where('status', 1)
            ->orderBy('name')
            ->get();

        $firstVariant = $product->variants->first();

        $attributes = Attribute::with('values')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
        $selectedCustomAttributeValues = $firstVariant
            ? $firstVariant->attributeEntries->whereNotNull('custom_value')->pluck('custom_value', 'attribute_id')->all()
            : [];

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
            'selectedAttributeValueIds',
            'selectedCustomAttributeValues'
        ));
    }

    public function saveAttributes(Request $request, Product $product)
    {
        $data = $request->validate([
            'attributes' => ['nullable', 'array'],
            'attributes.*.attribute_id' => ['required', 'integer', 'exists:attributes,id'],
            'attributes.*.values' => ['nullable', 'array'],
            'attributes.*.values.*' => ['integer', 'exists:attribute_values,id'],
            'attributes.*.custom_value' => ['nullable', 'string', 'max:2000'],
            'attributes.*.attribute_type' => ['required', Rule::in(['variation', 'information'])],
            'attributes.*.show_on_product' => ['nullable', 'boolean'],
        ]);

        $rows = $data['attributes'] ?? [];
        $attributeIds = collect($rows)->pluck('attribute_id')->map(fn ($id) => (int) $id);
        abort_if($attributeIds->duplicates()->isNotEmpty(), 422, 'Không được chọn trùng thuộc tính.');

        $attributes = Attribute::with('values')
            ->whereIn('id', $attributeIds)
            ->where('is_active', true)
            ->get()
            ->keyBy('id');

        abort_if($attributes->count() !== $attributeIds->unique()->count(), 422, 'Thuộc tính không hợp lệ.');

        DB::transaction(function () use ($product, $rows, $attributes): void {
            $product->attributes()->with('values')->get()->each(function (ProductAttribute $productAttribute): void {
                $productAttribute->values()->delete();
                $productAttribute->delete();
            });

            foreach ($rows as $row) {
                $attribute = $attributes->get((int) $row['attribute_id']);
                $selectedValues = collect($row['values'] ?? [])->map(fn ($id) => (int) $id)->unique();

                abort_if(
                    $selectedValues->diff($attribute->values->pluck('id'))->isNotEmpty(),
                    422,
                    'Giá trị thuộc tính không hợp lệ.'
                );

                $productAttribute = $product->attributes()->create([
                    'attribute_id' => $attribute->id,
                    'name' => $attribute->name,
                    'slug' => $attribute->slug,
                    'display_type' => $attribute->display_type,
                    'attribute_type' => $row['attribute_type'],
                    'show_on_product' => (bool) ($row['show_on_product'] ?? false),
                    'is_filterable' => $attribute->is_filterable,
                    'sort_order' => $attribute->sort_order,
                ]);

                foreach ($selectedValues as $valueId) {
                    $value = $attribute->values->firstWhere('id', $valueId);
                    $productAttribute->values()->create([
                        'attribute_value_id' => $value->id,
                        'color_hex' => $value->color_hex,
                        'sort_order' => $value->sort_order,
                    ]);
                }

                $customValue = trim((string) ($row['custom_value'] ?? ''));
                if ($customValue !== '') {
                    $productAttribute->values()->create(['custom_value' => $customValue]);
                }
            }
        });

        return response()->json([
            'message' => 'Đã lưu thuộc tính sản phẩm.',
            'product_id' => $product->id,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $firstVariant = ProductVariant::where('product_id', $product->id)->first();

        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],

            'attribute_value_ids' => ['nullable', 'array'],
            'attribute_value_ids.*' => ['nullable', 'integer', 'exists:attribute_values,id'],
            'attribute_custom_values' => ['nullable', 'array'],
            'attribute_custom_values.*' => ['nullable', 'string', 'max:255'],

            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],

            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'variant_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $customAttributeValues = $request->input('attribute_custom_values', []);
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
                $attributeValueIds,
                $customAttributeValues) {
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

            $this->syncProductAttributes($product, $attributeValueIds, $customAttributeValues);

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
            $this->saveAttributeEntries($variant, $attributeValueIds, $customAttributeValues);
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công.');
    }

    private function saveAttributeEntries(ProductVariant $variant, array $attributeValueIds, array $customValues): void
    {
        VariantAttributeValue::where('product_variant_id', $variant->id)->delete();

        foreach ($attributeValueIds as $attributeValueId) {
            $value = \App\Models\AttributeValue::find($attributeValueId);
            if ($value) {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $value->attribute_id,
                    'attribute_value_id' => $value->id,
                ]);
            }
        }

        foreach ($customValues as $attributeId => $customValue) {
            if (trim((string) $customValue) !== '') {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => (int) $attributeId,
                    'custom_value' => trim($customValue),
                ]);
            }
        }
    }

    private function syncProductAttributes(Product $product, array $attributeValueIds, array $customValues): void
    {
        $valueModels = \App\Models\AttributeValue::with('attribute')
            ->whereIn('id', $attributeValueIds)
            ->get()
            ->keyBy('id');

        $attributeIds = $valueModels->pluck('attribute_id')
            ->merge(collect($customValues)->keys()->map(fn ($id) => (int) $id))
            ->unique()
            ->values();

        $product->attributes()
            ->whereNotIn('attribute_id', $attributeIds->all() ?: [-1])
            ->get()
            ->each(function (ProductAttribute $productAttribute): void {
                $productAttribute->values()->delete();
                $productAttribute->delete();
            });

        foreach ($attributeIds as $attributeId) {
            $attribute = Attribute::whereKey($attributeId)->where('is_active', true)->first();
            if (!$attribute) {
                continue;
            }

            $productAttribute = ProductAttribute::updateOrCreate(
                ['product_id' => $product->id, 'attribute_id' => $attribute->id],
                [
                    'name' => $attribute->name,
                    'slug' => $attribute->slug,
                    'display_type' => $attribute->display_type,
                    'attribute_type' => $attribute->attribute_type,
                    'is_filterable' => $attribute->is_filterable,
                    'sort_order' => $attribute->sort_order,
                ]
            );

            $productAttribute->values()->delete();

            foreach ($valueModels->where('attribute_id', $attribute->id) as $value) {
                ProductAttributeValue::create([
                    'product_attribute_id' => $productAttribute->id,
                    'attribute_value_id' => $value->id,
                    'color_hex' => $value->color_hex,
                    'sort_order' => $value->sort_order,
                ]);
            }

            $customValue = trim((string) ($customValues[$attribute->id] ?? ''));
            if ($customValue !== '') {
                ProductAttributeValue::create([
                    'product_attribute_id' => $productAttribute->id,
                    'custom_value' => $customValue,
                ]);
            }
        }
    }

    private function parseProductAttributePayload(?string $payload): ?array
    {
        if ($payload === null || trim($payload) === '') {
            return null;
        }

        $rows = json_decode($payload, true);
        abort_if(!is_array($rows), 422, 'Dữ liệu thuộc tính sản phẩm không hợp lệ.');

        return collect($rows)->map(function ($row) {
            abort_if(!is_array($row), 422, 'Dòng thuộc tính không hợp lệ.');

            $attributeId = filter_var($row['attribute_id'] ?? null, FILTER_VALIDATE_INT);
            abort_if(!$attributeId, 422, 'Thuộc tính không hợp lệ.');

            return [
                'attribute_id' => $attributeId,
                'values' => collect($row['values'] ?? [])->map(fn ($id) => (int) $id)->filter()->unique()->values()->all(),
                'custom_value' => trim((string) ($row['custom_value'] ?? '')),
                'attribute_type' => in_array($row['attribute_type'] ?? '', ['variation', 'information'], true)
                    ? $row['attribute_type']
                    : 'information',
                'show_on_product' => (bool) ($row['show_on_product'] ?? false),
            ];
        })->values()->all();
    }

    private function syncProductAttributeRows(Product $product, array $rows): void
    {
        $attributeIds = collect($rows)->pluck('attribute_id');
        abort_if($attributeIds->duplicates()->isNotEmpty(), 422, 'Không được chọn trùng thuộc tính.');

        $attributes = Attribute::with('values')
            ->whereIn('id', $attributeIds)
            ->where('is_active', true)
            ->get()
            ->keyBy('id');

        abort_if($attributes->count() !== $attributeIds->unique()->count(), 422, 'Thuộc tính không tồn tại hoặc đã bị tắt.');

        foreach ($rows as $row) {
            $attribute = $attributes->get($row['attribute_id']);
            $selectedValues = collect($row['values']);
            abort_if($selectedValues->diff($attribute->values->pluck('id'))->isNotEmpty(), 422, 'Giá trị thuộc tính không hợp lệ.');

            $productAttribute = $product->attributes()->create([
                'attribute_id' => $attribute->id,
                'name' => $attribute->name,
                'slug' => $attribute->slug,
                'display_type' => $attribute->display_type,
                'attribute_type' => $row['attribute_type'],
                'show_on_product' => $row['show_on_product'],
                'is_filterable' => $attribute->is_filterable,
                'sort_order' => $attribute->sort_order,
            ]);

            foreach ($selectedValues as $valueId) {
                $value = $attribute->values->firstWhere('id', $valueId);
                $productAttribute->values()->create([
                    'attribute_value_id' => $value->id,
                    'color_hex' => $value->color_hex,
                    'sort_order' => $value->sort_order,
                ]);
            }

            if ($row['custom_value'] !== '') {
                $productAttribute->values()->create(['custom_value' => $row['custom_value']]);
            }
        }
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
        $directory = public_path('image/' . $folder);

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();

        $file->move(
            $directory,
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
