<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    public function ajaxStore(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:attributes,name'],
            'slug' => ['nullable', 'string', 'max:100', 'unique:attributes,slug'],
            'display_type' => ['required', Rule::in($this->displayTypes())],
            'attribute_type' => ['required', Rule::in(['variation', 'information'])],
            'is_filterable' => ['nullable', 'boolean'],
            'values' => ['nullable', 'string', 'max:5000'],
        ]);

        $attribute = Attribute::create([
            'name' => trim($data['name']),
            'slug' => $this->makeUniqueSlug($data['slug'] ?? $data['name']),
            'input_type' => $this->legacyInputType($data['display_type']),
            'display_type' => $data['display_type'],
            'attribute_type' => $data['attribute_type'],
            'is_active' => true,
            'is_filterable' => (bool) ($data['is_filterable'] ?? false),
        ]);

        $this->syncValues($attribute, $data['values'] ?? null);

        return response()->json([
            'message' => 'Đã tạo thuộc tính mới.',
            'attribute' => $attribute->load('values'),
        ], 201);
    }

    public function index(Request $request)
    {
        $attributes = Attribute::with(['values' => fn ($query) => $query->orderBy('sort_order')->orderBy('value')])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->string('search')->toString());
                $query->where(function ($attributeQuery) use ($search) {
                    $attributeQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.attributes.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:attributes,name'],
            'slug' => ['nullable', 'string', 'max:100', 'unique:attributes,slug'],
            'display_type' => ['required', Rule::in($this->displayTypes())],
            'attribute_type' => ['required', Rule::in(['variation', 'information'])],
            'is_filterable' => ['nullable', 'boolean'],
            'values' => ['nullable', 'string', 'max:5000'],
        ]);

        DB::transaction(function () use ($data) {
            $attribute = Attribute::create([
                'name' => trim($data['name']),
                'slug' => $this->makeUniqueSlug($data['slug'] ?? $data['name']),
                'input_type' => $this->legacyInputType($data['display_type']),
                'display_type' => $data['display_type'],
                'attribute_type' => $data['attribute_type'],
                'is_active' => true,
                'is_filterable' => (bool) ($data['is_filterable'] ?? false),
            ]);
            $this->syncValues($attribute, $data['values'] ?? null);
        });

        return back()->with('success', 'Đã thêm thuộc tính.');
    }

    public function update(Request $request, Attribute $attribute)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:attributes,name,' . $attribute->id],
            'slug' => ['nullable', 'string', 'max:100', Rule::unique('attributes', 'slug')->ignore($attribute->id)],
            'display_type' => ['required', Rule::in($this->displayTypes())],
            'attribute_type' => ['required', Rule::in(['variation', 'information'])],
            'is_active' => ['nullable', 'boolean'],
            'is_filterable' => ['nullable', 'boolean'],
            'values' => ['nullable', 'string', 'max:5000'],
        ]);

        DB::transaction(function () use ($data, $attribute) {
            $attribute->update([
                'name' => trim($data['name']),
                'slug' => $this->makeUniqueSlug($data['slug'] ?? $data['name'], $attribute->id),
                'input_type' => $this->legacyInputType($data['display_type']),
                'display_type' => $data['display_type'],
                'attribute_type' => $data['attribute_type'],
                'is_active' => (bool) ($data['is_active'] ?? false),
                'is_filterable' => (bool) ($data['is_filterable'] ?? false),
            ]);
            if (in_array($attribute->display_type, ['select', 'radio', 'checkbox', 'color', 'button'], true)) {
                $this->syncValues($attribute, $data['values'] ?? null);
            }
        });

        return back()->with('success', 'Đã cập nhật thuộc tính.');
    }

    public function destroy(Attribute $attribute)
    {
        $isUsed = $attribute->productAttributes()->exists()
            || $attribute->values()->whereHas('productVariants')->exists();

        if ($isUsed) {
            $attribute->update(['is_active' => false]);
            return back()->with('success', 'Thuộc tính đang được sử dụng nên đã được ẩn để bảo toàn dữ liệu.');
        }

        $attribute->delete();

        return back()->with('success', 'Đã xóa thuộc tính.');
    }

    public function storeValue(Request $request, Attribute $attribute)
    {
        abort_if(!$attribute->exists, 404);

        $data = $request->validate([
            'value' => ['required', 'string', 'max:191'],
            'slug' => ['nullable', 'string', 'max:191'],
            'color_hex' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:4294967295'],
        ]);

        $duplicate = $attribute->values()->whereRaw('LOWER(value) = ?', [mb_strtolower(trim($data['value']))])->exists();
        if ($duplicate) {
            return back()->withErrors(['value' => 'Giá trị đã tồn tại trong thuộc tính này.']);
        }

        $attribute->values()->create([
            'value' => trim($data['value']),
            'slug' => $this->makeValueSlug($attribute, $data['slug'] ?? $data['value']),
            'color_hex' => $data['color_hex'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Đã thêm giá trị thuộc tính.');
    }

    public function ajaxStoreValue(Request $request, Attribute $attribute)
    {
        $data = $request->validate([
            'value' => ['required', 'string', 'max:191'],
            'color_hex' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        $normalized = mb_strtolower(trim($data['value']));
        if ($attribute->values()->whereRaw('LOWER(value) = ?', [$normalized])->exists()) {
            return response()->json(['message' => 'Giá trị đã tồn tại trong thuộc tính này.'], 422);
        }

        $value = $attribute->values()->create([
            'value' => trim($data['value']),
            'slug' => $this->makeValueSlug($attribute, $data['value']),
            'color_hex' => $data['color_hex'] ?? null,
        ]);

        return response()->json([
            'message' => 'Đã thêm giá trị thuộc tính.',
            'value' => $value,
        ], 201);
    }

    public function updateValue(Request $request, Attribute $attribute, AttributeValue $value)
    {
        abort_if($value->attribute_id !== $attribute->id, 404);

        $data = $request->validate([
            'value' => ['required', 'string', 'max:191'],
            'slug' => ['nullable', 'string', 'max:191'],
            'color_hex' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:4294967295'],
        ]);

        $duplicate = $attribute->values()
            ->where('id', '!=', $value->id)
            ->whereRaw('LOWER(value) = ?', [mb_strtolower(trim($data['value']))])
            ->exists();

        if ($duplicate) {
            return back()->withErrors(['value' => 'Giá trị đã tồn tại trong thuộc tính này.']);
        }

        $value->update([
            'value' => trim($data['value']),
            'slug' => $this->makeValueSlug($attribute, $data['slug'] ?? $data['value'], $value->id),
            'color_hex' => $data['color_hex'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Đã cập nhật giá trị thuộc tính.');
    }

    public function destroyValue(Attribute $attribute, AttributeValue $value)
    {
        abort_if($value->attribute_id !== $attribute->id, 404);

        if ($value->productVariants()->exists() || $value->productAttributeValues()->exists()) {
            return back()->with('error', 'Không thể xóa giá trị đang được sử dụng.');
        }

        $value->delete();

        return back()->with('success', 'Đã xóa giá trị thuộc tính.');
    }

    private function syncValues(Attribute $attribute, ?string $input): void
    {
        $values = collect(preg_split('/[\r\n,;]+/', trim((string) $input), -1, PREG_SPLIT_NO_EMPTY))
            ->map(fn ($value) => trim($value))
            ->filter()
            ->unique()
            ->values();

        foreach ($values as $value) {
            $attribute->values()->firstOrCreate(
                ['value' => $value],
                ['slug' => $this->makeValueSlug($attribute, $value)]
            );
        }
    }

    private function displayTypes(): array
    {
        return ['text', 'number', 'select', 'radio', 'checkbox', 'color', 'button', 'textarea'];
    }

    private function legacyInputType(string $displayType): string
    {
        return match ($displayType) {
            'number' => 'number',
            'text', 'textarea' => 'text',
            default => 'select',
        };
    }

    private function makeUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'attribute';
        $slug = $base;
        $suffix = 2;

        while (true) {
            $query = Attribute::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
            if (!$query->exists()) {
                return $slug;
            }
            $slug = $base . '-' . $suffix++;
        }
    }

    private function makeValueSlug(Attribute $attribute, string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'value';
        $slug = $base;
        $suffix = 2;

        while (true) {
            $query = $attribute->values()->where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
            if (!$query->exists()) {
                return $slug;
            }
            $slug = $base . '-' . $suffix++;
        }
    }
}
