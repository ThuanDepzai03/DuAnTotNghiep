<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Services\SeederSyncService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
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

        $imagePath = $request->hasFile('image')
            ? $this->uploadImage($request->file('image'))
            : $this->useGeneratedImage($data['generated_image'] ?? null);

        Banner::create([
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
            ->with('success', 'Thêm banner trang chủ thành công.');
    }

    public function generateImage(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'in:hero,static_full,static_rect'],
            'style' => ['nullable', 'string', 'max:500'],
            'previous_image' => ['nullable', 'string'],
        ]);

        $apiKey = config('services.gemini.api_key');
        if (! $apiKey) {
            return response()->json(['message' => 'Chưa cấu hình GEMINI_API_KEY trong file .env.'], 422);
        }

        $layout = match ($data['type']) {
            'static_full' => 'wide full-width website banner, aspect ratio about 3:1',
            'static_rect' => 'balanced rectangular website banner, aspect ratio about 4:3',
            default => 'wide hero website banner, aspect ratio about 16:6',
        };

        $prompt = 'Create a clean commercial banner background for a Vietnamese electronics store. '
            . $layout . '. Product-focused composition, clear negative space for HTML text overlay, '
            . 'no readable text, no letters, no logos, no watermark. '
            . 'Theme: ' . ($data['style'] ?: 'modern, premium, bright and trustworthy') . '. '
            . 'Promotion context: ' . ($data['title'] ?: 'new electronics products') . '. '
            . 'Subtitle context: ' . ($data['subtitle'] ?: 'special offer') . '.';

        $endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/'
            . config('services.gemini.image_model') . ':generateContent';

        try {
            $response = Http::timeout(90)
                ->when(! config('services.gemini.verify_ssl'), fn ($http) => $http->withoutVerifying())
                ->withQueryParameters(['key' => $apiKey])
                ->post($endpoint, [
                    'contents' => [['parts' => [['text' => $prompt]]]],
                    'generationConfig' => ['responseModalities' => ['TEXT', 'IMAGE']],
                ]);
        } catch (ConnectionException $exception) {
            return response()->json([
                'message' => 'Không kết nối được Google AI. Kiểm tra SSL hoặc kết nối Internet của PHP.',
            ], 502);
        }

        if ($response->failed()) {
            return response()->json([
                'message' => 'AI không tạo được ảnh: ' . ($response->json('error.message') ?: 'API trả về lỗi.'),
            ], 502);
        }

        $imagePart = collect($response->json('candidates.0.content.parts', []))
            ->first(fn ($part) => ! empty($part['inlineData']['data']));

        if (! $imagePart) {
            return response()->json(['message' => 'Model Gemini hiện không trả về dữ liệu ảnh. Hãy kiểm tra GEMINI_IMAGE_MODEL.'], 502);
        }

        $mimeType = $imagePart['inlineData']['mimeType'] ?? 'image/png';
        $extension = $mimeType === 'image/jpeg' ? 'jpg' : 'png';
        $fileName = 'ai-' . time() . '-' . Str::random(8) . '.' . $extension;
        $directory = public_path('uploads/banners');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        file_put_contents($directory . DIRECTORY_SEPARATOR . $fileName, base64_decode($imagePart['inlineData']['data']));

        if (! empty($data['previous_image'])) {
            $this->deleteGeneratedImage($data['previous_image']);
        }

        return response()->json(['path' => 'uploads/banners/' . $fileName]);
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

    private function useGeneratedImage(?string $path): string
    {
        if (! $path || ! preg_match('#^uploads/banners/ai-[A-Za-z0-9_-]+\.(png|jpg)$#', $path) || ! is_file(public_path($path))) {
            abort(422, 'Ảnh AI không hợp lệ hoặc đã hết hạn.');
        }

        return $path;
    }

    private function deleteGeneratedImage(string $path): void
    {
        if (preg_match('#^uploads/banners/ai-[A-Za-z0-9_-]+\.(png|jpg)$#', $path)) {
            $this->deleteImage($path);
        }
    }
}
