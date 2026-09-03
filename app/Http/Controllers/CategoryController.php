<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\SeederSyncService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->with('parent')
            ->orderByDesc('status')
            ->orderBy('name')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')->where('status', 1)->orderBy('name')->get();

        return view('admin.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'status' => ['required', 'in:0,1'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Danh mục này đã tồn tại.',
        ]);

        Category::create([
            'name' => trim($data['name']),
            'parent_id' => $data['parent_id'] ?? null,
            'slug' => $this->makeUniqueSlug($data['name']),
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncCategories();

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
        $parentCategories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->where('id', '!=', $category->id)
            ->orderBy('name')
            ->get();

        return view('admin.categories.edit', compact('category', 'parentCategories'));
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
            'parent_id' => ['nullable', 'exists:categories,id', 'not_in:' . $category->id],
            'status' => ['required', 'in:0,1'],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Danh mục này đã tồn tại.',
        ]);

        $category->update([
            'name' => trim($data['name']),
            'parent_id' => $data['parent_id'] ?? null,
            'slug' => $this->makeUniqueSlug($data['name'], $category->id),
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncCategories();

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

        SeederSyncService::syncCategories();

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

        SeederSyncService::syncCategories();

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
