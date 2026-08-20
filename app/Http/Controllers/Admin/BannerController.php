<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('position', 'home')
            ->orderByDesc('status')
            ->latest()
            ->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'link' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:0,1'],
        ], [
            'image.required' => 'Vui lòng chọn ảnh banner.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.max' => 'Ảnh banner không được vượt quá 4MB.',
            'link.url' => 'Liên kết banner không hợp lệ.',
        ]);

        Banner::create([
            'title' => trim($data['title'] ?? ''),
            'image' => $this->uploadImage($request->file('image')),
            'link' => $data['link'] ?? null,
            'position' => 'home',
            'status' => (int) $data['status'],
        ]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Thêm banner trang chủ thành công.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'link' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:0,1'],
        ], [
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.max' => 'Ảnh banner không được vượt quá 4MB.',
            'link.url' => 'Liên kết banner không hợp lệ.',
        ]);

        $banner->update([
            'title' => trim($data['title'] ?? ''),
            'image' => $request->hasFile('image')
                ? $this->uploadImage($request->file('image'))
                : $banner->image,
            'link' => $data['link'] ?? null,
            'position' => 'home',
            'status' => (int) $data['status'],
        ]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Cập nhật banner thành công.');
    }

    public function destroy(Banner $banner)
    {
        $banner->update(['status' => 0]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Đã ẩn banner.');
    }

    public function restore($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->update(['status' => 1]);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Khôi phục banner thành công.');
    }

    private function uploadImage($file): string
    {
        $directory = public_path('image/banners');

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        return 'image/banners/' . $fileName;
    }
}
