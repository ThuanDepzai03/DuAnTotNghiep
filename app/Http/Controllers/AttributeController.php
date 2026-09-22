<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('values')->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.attributes.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:attributes,name'],
            'input_type' => ['required', 'in:select,text,number,boolean'],
            'values' => ['nullable', 'string', 'max:5000'],
        ]);

        DB::transaction(function () use ($data) {
            $attribute = Attribute::create([
                'name' => trim($data['name']),
                'input_type' => $data['input_type'],
                'is_active' => true,
            ]);
            $this->syncValues($attribute, $data['values'] ?? null);
        });

        return back()->with('success', 'Đã thêm thuộc tính.');
    }

    public function update(Request $request, Attribute $attribute)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:attributes,name,' . $attribute->id],
            'input_type' => ['required', 'in:select,text,number,boolean'],
            'is_active' => ['nullable', 'boolean'],
            'values' => ['nullable', 'string', 'max:5000'],
        ]);

        DB::transaction(function () use ($data, $attribute) {
            $attribute->update([
                'name' => trim($data['name']),
                'input_type' => $data['input_type'],
                'is_active' => (bool) ($data['is_active'] ?? false),
            ]);
            if ($attribute->input_type === 'select') {
                $this->syncValues($attribute, $data['values'] ?? null);
            }
        });

        return back()->with('success', 'Đã cập nhật thuộc tính.');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->update(['is_active' => false]);
        return back()->with('success', 'Đã ẩn thuộc tính. Dữ liệu cũ vẫn được giữ.');
    }

    private function syncValues(Attribute $attribute, ?string $input): void
    {
        $values = collect(preg_split('/[\r\n,;]+/', trim((string) $input), -1, PREG_SPLIT_NO_EMPTY))
            ->map(fn ($value) => trim($value))
            ->filter()
            ->unique()
            ->values();

        foreach ($values as $value) {
            $attribute->values()->firstOrCreate(['value' => $value]);
        }
    }
}
