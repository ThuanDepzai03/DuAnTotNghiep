@php
    $isEdit = isset($banner) && $banner;
    $selectedType = old('type', $banner->type ?? 'hero');
    $selectedStatus = old('status', $isEdit ? (int) $banner->status : 1);
@endphp

<div class="mb-3">
    <label for="banner-title" class="form-label">Tiêu đề</label>
    <input id="banner-title" type="text" name="title" value="{{ old('title', $banner->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" maxlength="255">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="banner-subtitle" class="form-label">Mô tả phụ</label>
    <input id="banner-subtitle" type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}" class="form-control @error('subtitle') is-invalid @enderror" maxlength="255">
    @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="banner-title-font-size" class="form-label">Cỡ chữ tiêu đề (px)</label>
        <input id="banner-title-font-size" type="number" name="title_font_size" value="{{ old('title_font_size', $banner->title_font_size ?? 37) }}" min="12" max="72" class="form-control @error('title_font_size') is-invalid @enderror" required>
        @error('title_font_size') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="banner-subtitle-font-size" class="form-label">Cỡ chữ mô tả (px)</label>
        <input id="banner-subtitle-font-size" type="number" name="subtitle_font_size" value="{{ old('subtitle_font_size', $banner->subtitle_font_size ?? 16) }}" min="10" max="36" class="form-control @error('subtitle_font_size') is-invalid @enderror" required>
        @error('subtitle_font_size') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label for="banner-image" class="form-label">Ảnh banner {{ $isEdit ? '' : '*' }}</label>
    @if($isEdit)
        <div class="mb-2">
            <img id="current-banner-image" src="{{ asset($banner->image) }}" alt="{{ $banner->title ?: 'Banner hiện tại' }}" style="width: 100%; max-width: 680px; height: 180px; object-fit: cover;">
        </div>
    @endif
    <input id="banner-image" type="file" name="image" accept="image/jpeg,image/png,image/webp" class="form-control @error('image') is-invalid @enderror" {{ $isEdit ? '' : 'required' }}>
    <div class="form-text">JPG, PNG hoặc WEBP, tối đa 2MB.</div>
    <img id="banner-image-preview" src="" alt="Xem trước ảnh" class="d-none mt-2" style="width: 100%; max-width: 680px; height: 180px; object-fit: cover;">
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="banner-type" class="form-label">Loại banner <span class="text-danger">*</span></label>
        <select id="banner-type" name="type" class="form-select @error('type') is-invalid @enderror" required>
            <option value="hero" {{ $selectedType === 'hero' ? 'selected' : '' }}>Hero - banner động trượt</option>
            <option value="static_full" {{ $selectedType === 'static_full' ? 'selected' : '' }}>Static full - banner tĩnh full-width</option>
            <option value="static_rect" {{ $selectedType === 'static_rect' ? 'selected' : '' }}>Static rect - banner chữ nhật</option>
        </select>
        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-3 mb-3">
        <label for="banner-position" class="form-label">Thứ tự <span class="text-danger">*</span></label>
        <input id="banner-position" type="number" name="position" value="{{ old('position', $banner->position ?? 0) }}" min="0" class="form-control @error('position') is-invalid @enderror" required>
        @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-3 mb-3">
        <label for="banner-status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
        <select id="banner-status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="1" {{ (string) $selectedStatus === '1' ? 'selected' : '' }}>Bật</option>
            <option value="0" {{ (string) $selectedStatus === '0' ? 'selected' : '' }}>Tắt</option>
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-4">
    <label for="banner-link" class="form-label">Liên kết khi click</label>
    <input id="banner-link" type="text" name="link" value="{{ old('link', $banner->link ?? '') }}" class="form-control @error('link') is-invalid @enderror" maxlength="2048" placeholder="https://example.com hoặc /shop">
    @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> {{ $submitLabel }}</button>
<a href="{{ route('admin.banners.index') }}" class="btn btn-light-secondary">Hủy</a>

@once
    @push('scripts')
        <script>
            document.querySelectorAll('#banner-image').forEach(function (input) {
                input.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('banner-image-preview');

                    if (!file) {
                        preview.src = '';
                        preview.classList.add('d-none');
                        return;
                    }

                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('d-none');
                });
            });
        </script>
    @endpush
@endonce
