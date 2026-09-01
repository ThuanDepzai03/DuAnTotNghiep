<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Services\SeederSyncService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function index(): View
    {
        $banners = Banner::query()
            ->when(request('type'), fn ($query, $type) => $query->byType($type))
            ->orderBy('position')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.banners.index', compact('banners'));
    }

    public function create(): View
    {
        return view('admin.banners.create');
    }

    public function store(StoreBannerRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Banner::create([
            'title' => trim($data['title'] ?? ''),
            'subtitle' => trim($data['subtitle'] ?? ''),
            'title_font_size' => (int) $data['title_font_size'],
            'subtitle_font_size' => (int) $data['subtitle_font_size'],
            'image' => $this->uploadImage($request->file('image')),
            'link' => $data['link'] ?? null,
            'type' => $data['type'],
            'position' => (int) $data['position'],
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncBanners();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Thêm banner trang chủ thành công.');
    }

    public function show(Banner $banner): RedirectResponse
    {
        return redirect()->route('admin.banners.edit', $banner);
    }

    public function edit(Banner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = $banner->image;

        if ($request->hasFile('image')) {
            $this->deleteImage($banner->image);
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $banner->update([
            'title' => trim($data['title'] ?? ''),
            'subtitle' => trim($data['subtitle'] ?? ''),
            'title_font_size' => (int) $data['title_font_size'],
            'subtitle_font_size' => (int) $data['subtitle_font_size'],
            'image' => $imagePath,
            'link' => $data['link'] ?? null,
            'type' => $data['type'],
            'position' => (int) $data['position'],
            'status' => (int) $data['status'],
        ]);

        SeederSyncService::syncBanners();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Cập nhật banner thành công.');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        $this->deleteImage($banner->image);
        $banner->delete();

        SeederSyncService::syncBanners();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Đã xóa banner.');
    }

    public function toggleStatus(Banner $banner): RedirectResponse
    {
        $banner->update(['status' => ! $banner->status]);

        SeederSyncService::syncBanners();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', $banner->status ? 'Đã bật banner.' : 'Đã tắt banner.');
    }

    private function uploadImage($file): string
    {
        $directory = public_path('uploads/banners');

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        return 'uploads/banners/' . $fileName;
    }

    private function deleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        $filePath = public_path($path);

        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }
}
