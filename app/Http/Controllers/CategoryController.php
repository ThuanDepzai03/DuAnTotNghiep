<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->orderByDesc('status')
            ->orderBy('name')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'status' => ['required', 'in:0,1'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Danh mục này đã tồn tại.',
        ]);

        Category::create([
            'name' => trim($data['name']),
            'slug' => $this->makeUniqueSlug($data['name']),
            'status' => (int) $data['status'],
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Thêm danh mục thành công.');
    }

    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit', $category->id);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
            'status' => ['required', 'in:0,1'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Danh mục này đã tồn tại.',
        ]);

        $category->update([
            'name' => trim($data['name']),
            'slug' => $this->makeUniqueSlug($data['name'], $category->id),
            'status' => (int) $data['status'],
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    // Ẩn danh mục, không xóa hẳn
    public function destroy(Category $category)
    {
        $category->update([
            'status' => 0,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Đã ẩn danh mục.');
    }

    public function restore($id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'status' => 1,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Khôi phục danh mục thành công.');
    }

    private function makeUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name) ?: 'danh-muc';
        $slug = $baseSlug;
        $number = 2;

        while (true) {
            $query = Category::where('slug', $slug);

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
}
