<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariant;
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
            'variants.attributeValues.attribute',
        ]);

        $attributes = Attribute::with('values')
            ->orderBy('id')
            ->get();

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
                'sku' => $data['sku'],
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $imagePath ?? $product->thumbnail,
                'status' => (int) $data['status'],
            ]);

            $variant->attributeValues()->sync($attributeValueIds);
        });

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Đã thêm biến thể mới.');
    }

    public function update(
        Request $request,
        Product $product,
        ProductVariant $variant
    ) {
        abort_if($variant->product_id !== $product->id, 404);

        $data = $this->validateVariant($request, $variant);

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
                'sku' => $data['sku'],
                'price' => $data['price'],
                'sale_price' => $data['sale_price'] ?? null,
                'stock' => $data['stock'],
                'image' => $imagePath ?? $product->thumbnail,
                'status' => (int) $data['status'],
            ]);

            $variant->attributeValues()->sync($attributeValueIds);
        });

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Cập nhật biến thể thành công.');
    }

    public function destroy(Product $product, ProductVariant $variant)
    {
        abort_if($variant->product_id !== $product->id, 404);

        DB::transaction(function () use ($variant) {
            $variant->attributeValues()->detach();
            $variant->delete();
        });

        return redirect()
            ->route('admin.products.variants.index', $product->id)
            ->with('success', 'Đã xóa biến thể.');
    }

    private function validateVariant(
        Request $request,
        ?ProductVariant $variant = null
    ): array {
        $skuRule = Rule::unique('product_variants', 'sku');

        if ($variant) {
            $skuRule->ignore($variant->id);
        }

        return $request->validate([
            'sku' => ['required', 'string', 'max:191', $skuRule],
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
        ], [
            'sku.required' => 'Vui lòng nhập mã biến thể.',
            'sku.unique' => 'Mã biến thể đã tồn tại.',
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
