<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\SeederSyncService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()
            ->orderByDesc('status')
            ->orderBy('name')
            ->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:brands,name'],
            'status' => ['required', 'in:0,1'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:2048'],
        ], [
            'name.required' => 'Vui lòng nhập tên thương hiệu.',
            'name.unique' => 'Thương hiệu này đã tồn tại.',
            'logo.image' => 'Logo phải là file ảnh.',
            'logo.max' => 'Logo không được vượt quá 2MB.',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $this->uploadLogo($request->file('logo'));
        }

        Brand::create([
            'name' => trim($data['name']),
            'slug' => $this->makeUniqueSlug($data['name']),
            'logo' => $logoPath,
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncBrands();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Thêm thương hiệu thành công.');
    }

    public function show(Brand $brand)
    {
        return redirect()->route('admin.brands.edit', $brand->id);
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands', 'name')->ignore($brand->id),
            ],
            'status' => ['required', 'in:0,1'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:2048'],
        ], [
            'name.required' => 'Vui lòng nhập tên thương hiệu.',
            'name.unique' => 'Thương hiệu này đã tồn tại.',
            'logo.image' => 'Logo phải là file ảnh.',
            'logo.max' => 'Logo không được vượt quá 2MB.',
        ]);

        $logoPath = $brand->logo;

        if ($request->hasFile('logo')) {
            $this->deleteLogo($brand->logo);
            $logoPath = $this->uploadLogo($request->file('logo'));
        }

        $brand->update([
            'name' => trim($data['name']),
            'slug' => $this->makeUniqueSlug($data['name'], $brand->id),
            'logo' => $logoPath,
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncBrands();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Cập nhật thương hiệu thành công.');
    }

    public function destroy(Brand $brand)
    {
        $brand->update(['status' => 0]);

        SeederSyncService::syncBrands();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Đã ẩn thương hiệu.');
    }

    public function restore($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->update(['status' => 1]);

        SeederSyncService::syncBrands();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Khôi phục thương hiệu thành công.');
    }

    private function uploadLogo($file): string
    {
        $directory = public_path('uploads/brands');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = time() . '-' . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        return 'uploads/brands/' . $fileName;
    }

    private function deleteLogo(?string $path): void
    {
        if (! $path) {
            return;
        }

        $filePath = public_path($path);

        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }

    private function makeUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name) ?: 'thuong-hieu';
        $slug = $baseSlug;
        $number = 2;

        while (true) {
            $query = Brand::where('slug', $slug);

            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            if (! $query->exists()) {
                return $slug;
            }

            $slug = $baseSlug . '-' . $number;
            $number++;
        }
    }
}
