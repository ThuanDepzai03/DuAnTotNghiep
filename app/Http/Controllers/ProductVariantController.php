<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductVariantController extends Controller
{
    public function index(Request $request, Product $product)
    {
        $product->load([
            'category',
            'brand',
            'attributes.attribute.values',
            'attributes.values.attributeValue',
            'variants.attributeValues.attribute',
            'variants.attributeEntries.attribute',
            'variants.imeis',
        ]);

        $attributes = $product->attributes()
            ->with('attribute.values')
            ->get()
            ->map(function ($productAttribute) {
                $attribute = $productAttribute->attribute;
                if (!$attribute) {
                    return null;
                }
                $attribute->attribute_type = $productAttribute->attribute_type;
                return $attribute;
            })
            ->filter()
            ->values();

        if ($attributes->isEmpty()) {
            $attributes = Attribute::with('values')->where('is_active', true)->orderBy('sort_order')->get();
        }

        $editingVariant = null;

        if ($request->filled('edit')) {
            $editingVariant = $product->variants
                ->firstWhere('id', (int) $request->edit);

            abort_if(!$editingVariant, 404);
        }

        return view('admin.products.variants', compact(
            'product',
            'attributes',
            'editingVariant'
        ));
    }

    public function store(Request $request, Product $product)
    {
        $data = $this->validateVariant($request);

        $attributeValueIds = $this->getAttributeValueIds($data);

        DB::transaction(function () use (
            $request,
            $product,
            $data,
            $attributeValueIds
        ) {
            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $this->uploadImage($request->file('image'));
            }

            $variant = $product->variants()->create([
                'sku' => $this->generateVariantSku($product, $attributeValueIds),
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $imagePath ?? $product->thumbnail,
                'status' => (int) $data['status'],
            ]);

            $variant->attributeValues()->sync($attributeValueIds);
            $this->saveAttributeEntries($variant, $data, $attributeValueIds);
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Đã thêm biến thể mới.');
    }

    public function generate(Request $request, Product $product)
    {
        $data = $request->validate([
            'attribute_values' => ['required', 'array', 'min:1'],
            'attribute_values.*' => ['required', 'array', 'min:1'],
            'attribute_values.*.*' => ['integer', 'distinct', 'exists:attribute_values,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:0,1'],
        ]);

        $valueIds = collect($data['attribute_values'])->map(
            fn (array $ids) => collect($ids)->map(fn ($id) => (int) $id)->unique()->values()->all()
        )->filter()->values()->all();

        $values = \App\Models\AttributeValue::with('attribute')
            ->whereIn('id', collect($valueIds)->flatten()->unique())
            ->get()
            ->keyBy('id');

        $allowedValueIds = $product->attributes()
            ->where('attribute_type', 'variation')
            ->with('values')
            ->get()
            ->flatMap(fn ($attribute) => $attribute->values->pluck('attribute_value_id'))
            ->map(fn ($id) => (int) $id)
            ->unique();

        if ($allowedValueIds->isEmpty()) {
            $allowedValueIds = Attribute::with('values')
                ->where('is_active', true)
                ->where('attribute_type', 'variation')
                ->get()
                ->flatMap(fn (Attribute $attribute) => $attribute->values->pluck('id'))
                ->map(fn ($id) => (int) $id)
                ->unique();
        }

        if (collect($valueIds)->flatten()->diff($allowedValueIds)->isNotEmpty()) {
            abort(422, 'Chỉ được dùng giá trị của thuộc tính variation đã gán cho sản phẩm.');
        }

        foreach ($valueIds as $ids) {
            foreach ($ids as $id) {
                abort_if(!$values->has($id), 422, 'Giá trị thuộc tính không hợp lệ.');
            }
        }

        $combinations = [[]];
        foreach ($valueIds as $ids) {
            $combinations = collect($combinations)->flatMap(
                fn (array $combination) => collect($ids)->map(
                    fn (int $id) => [...$combination, $id]
                )
            )->values()->all();
        }

        $created = 0;
        DB::transaction(function () use ($product, $data, $combinations, $values, &$created): void {
            $existingKeys = $product->variants()
                ->with('attributeValues:id')
                ->get()
                ->mapWithKeys(fn (ProductVariant $variant) => [
                    $this->variantKey($variant->attributeValues->pluck('id')->all()) => true,
                ]);

            foreach ($combinations as $combination) {
                $key = $this->variantKey($combination);
                if ($existingKeys->has($key)) {
                    continue;
                }

                $variant = $product->variants()->create([
                    'sku' => $this->generateVariantSku($product, $combination),
                    'price' => $data['price'],
                    'sale_price' => $data['sale_price'] ?? null,
                    'stock' => $data['stock'],
                    'image' => $product->thumbnail,
                    'status' => (int) $data['status'],
                ]);

                $variant->attributeValues()->sync($combination);
                $this->saveAttributeEntries($variant, [], $combination);
                $existingKeys->put($key, true);
                $created++;
            }
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', "Đã tạo {$created} biến thể mới; biến thể cũ được giữ nguyên.");
    }

    public function update(
        Request $request,
        Product $product,
        ProductVariant $variant
    ) {
        abort_if($variant->product_id !== $product->id, 404);

        $data = $this->validateVariant($request, $variant);

        if ($variant->imeis()->exists()) {
            $imeiStock = $variant->imeis()->where('status', 'in_stock')->count();
            abort_if((int) $data['stock'] !== $imeiStock, 422, 'Tồn kho phải khớp với số IMEI đang ở trong kho.');
        }

        $attributeValueIds = $this->getAttributeValueIds($data);

        DB::transaction(function () use (
            $request,
            $product,
            $variant,
            $data,
            $attributeValueIds
        ) {
            $imagePath = $variant->image;

            if ($request->hasFile('image')) {
                $imagePath = $this->uploadImage($request->file('image'));
            }

            $variant->update([
                // SKU is not editable
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $imagePath ?? $product->thumbnail,
                'status' => (int) $data['status'],
            ]);

            $variant->attributeValues()->sync($attributeValueIds);
            $this->saveAttributeEntries($variant, $data, $attributeValueIds);
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Cập nhật biến thể thành công.');
    }

    public function destroy(Product $product, ProductVariant $variant)
    {
        abort_if($variant->product_id !== $product->id, 404);
        abort_if($variant->orderItems()->exists(), 422, 'Không thể xóa biến thể đã xuất hiện trong đơn hàng.');

        DB::transaction(function () use ($variant) {
            $variant->attributeValues()->detach();
            VariantAttributeValue::where('product_variant_id', $variant->id)->delete();
            $variant->delete();
        });

        \App\Services\SeederSyncService::syncProducts();

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Đã xóa biến thể.');
    }

    private function validateVariant(
        Request $request,
        ?ProductVariant $variant = null
    ): array {
        return $request->validate([
            // SKU is generated automatically; do not accept from user
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:0,1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'attribute_value_ids' => ['nullable', 'array'],
            'attribute_value_ids.*' => [
                'nullable',
                'integer',
                'exists:attribute_values,id',
            ],
            'attribute_custom_values' => ['nullable', 'array'],
            'attribute_custom_values.*' => ['nullable', 'string', 'max:255'],
        ], [
            'price.required' => 'Vui lòng nhập giá gốc.',
            'sale_price.lte' => 'Giá khuyến mãi không được lớn hơn giá gốc.',
            'stock.required' => 'Vui lòng nhập tồn kho.',
        ]);
    }

    private function getAttributeValueIds(array $data): array
    {
        return collect($data['attribute_value_ids'] ?? [])
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();
    }

    private function variantKey(array $attributeValueIds): string
    {
        $ids = array_map('intval', $attributeValueIds);
        sort($ids);

        return implode('-', $ids);
    }

    private function saveAttributeEntries(ProductVariant $variant, array $data, array $attributeValueIds): void
    {
        VariantAttributeValue::where('product_variant_id', $variant->id)->delete();

        foreach ($attributeValueIds as $attributeValueId) {
            $attributeValue = \App\Models\AttributeValue::find($attributeValueId);
            if ($attributeValue) {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $attributeValue->attribute_id,
                    'attribute_value_id' => $attributeValue->id,
                ]);
            }
        }

        foreach ($data['attribute_custom_values'] ?? [] as $attributeId => $customValue) {
            if (trim((string) $customValue) !== '') {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => (int) $attributeId,
                    'custom_value' => trim($customValue),
                ]);
            }
        }
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

    private function uploadImage($file): string
    {
        $folder = public_path('image/variants');

        File::ensureDirectoryExists($folder);

        $fileName = now()->format('YmdHis')
            . '-'
            . Str::random(8)
            . '.'
            . $file->getClientOriginalExtension();

        $file->move($folder, $fileName);

        return 'image/variants/' . $fileName;
    }
}
