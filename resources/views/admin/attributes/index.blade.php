@extends('admin.layout')
@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý thuộc tính</h3>
            <p class="text-subtitle text-muted mb-0">Quản lý thuộc tính dùng chung và giá trị cho sản phẩm.</p>
        </div>
    </div>
</div>

<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(isset($errors) && $errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header"><h4 class="card-title mb-0">Thêm thuộc tính</h4></div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.attributes.store') }}" class="row g-3">
                @csrf
                <div class="col-lg-3">
                    <label class="form-label">Tên thuộc tính</label>
                    <input name="name" class="form-control" placeholder="Ví dụ: Màu sắc" required>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Slug</label>
                    <input name="slug" class="form-control" placeholder="Tự sinh nếu bỏ trống">
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Kiểu hiển thị</label>
                    <select name="display_type" class="form-select" required>
                        @foreach(['select' => 'Select', 'radio' => 'Radio', 'checkbox' => 'Checkbox', 'color' => 'Màu sắc', 'button' => 'Nút', 'text' => 'Văn bản', 'number' => 'Số', 'textarea' => 'Nhiều dòng'] as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Loại thuộc tính</label>
                    <select name="attribute_type" class="form-select" required>
                        <option value="variation">Variation</option>
                        <option value="information">Information</option>
                    </select>
                </div>
                <div class="col-lg-2 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input type="hidden" name="is_filterable" value="0">
                        <input class="form-check-input" type="checkbox" name="is_filterable" value="1" id="new-filterable">
                        <label class="form-check-label" for="new-filterable">Cho phép lọc</label>
                    </div>
                </div>
                <div class="col-lg-1 d-flex align-items-end">
                    <button class="btn btn-primary w-100" type="submit">Thêm</button>
                </div>
                <div class="col-12">
                    <label class="form-label">Giá trị ban đầu</label>
                    <input name="values" class="form-control" placeholder="128GB, 256GB, 512GB">
                </div>
            </form>
        </div>
    </div>

    <form method="GET" action="{{ route('admin.attributes.index') }}" class="input-group mb-3">
        <input name="search" value="{{ request('search') }}" class="form-control" placeholder="Tìm theo tên hoặc slug">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </form>

    @forelse($attributes as $attribute)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <strong>{{ $attribute->name }}</strong>
                    <span class="text-muted ms-2">{{ $attribute->slug }}</span>
                    <span class="badge bg-light-primary text-primary ms-2">{{ $attribute->attribute_type }}</span>
                    <span class="badge {{ $attribute->is_active ? 'bg-success' : 'bg-secondary' }} ms-1">
                        {{ $attribute->is_active ? 'Đang bật' : 'Đã tắt' }}
                    </span>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#edit-attribute-{{ $attribute->id }}">Sửa</button>
                    <form method="POST" action="{{ route('admin.attributes.destroy', $attribute) }}" onsubmit="return confirm('Xóa hoặc ẩn thuộc tính này?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" type="submit">Xóa / Ẩn</button>
                    </form>
                </div>
            </div>
            <div class="collapse" id="edit-attribute-{{ $attribute->id }}">
                <div class="card-body border-bottom">
                    <form method="POST" action="{{ route('admin.attributes.update', $attribute) }}" class="row g-2">
                        @csrf @method('PUT')
                        <div class="col-md-3"><input name="name" value="{{ $attribute->name }}" class="form-control" required></div>
                        <div class="col-md-2"><input name="slug" value="{{ $attribute->slug }}" class="form-control"></div>
                        <div class="col-md-2"><select name="display_type" class="form-select">@foreach(['select','radio','checkbox','color','button','text','number','textarea'] as $type)<option value="{{ $type }}" @selected($attribute->display_type === $type)>{{ $type }}</option>@endforeach</select></div>
                        <div class="col-md-2"><select name="attribute_type" class="form-select"><option value="variation" @selected($attribute->attribute_type === 'variation')>variation</option><option value="information" @selected($attribute->attribute_type === 'information')>information</option></select></div>
                        <div class="col-md-2"><select name="is_active" class="form-select"><option value="1" @selected($attribute->is_active)>Đang bật</option><option value="0" @selected(!$attribute->is_active)>Đã tắt</option></select></div>
                        <div class="col-md-1"><button class="btn btn-primary w-100">Lưu</button></div>
                        <div class="col-12"><input name="values" class="form-control" placeholder="Thêm giá trị, ngăn cách bằng dấu phẩy"></div>
                        <input type="hidden" name="is_filterable" value="{{ $attribute->is_filterable ? 1 : 0 }}">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($attribute->values as $value)
                                <span class="badge bg-light-secondary text-dark border">{{ $value->value }} @if($value->color_hex)<span class="ms-1" style="display:inline-block;width:12px;height:12px;background:{{ $value->color_hex }};border:1px solid #999"></span>@endif</span>
                            @empty
                                <span class="text-muted">Chưa có giá trị dựng sẵn.</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form method="POST" action="{{ route('admin.attributes.values.store', $attribute) }}" class="row g-2">
                            @csrf
                            <div class="col-12"><input name="value" class="form-control form-control-sm" placeholder="Giá trị mới" required></div>
                            <div class="col-7"><input name="color_hex" class="form-control form-control-sm" placeholder="#000000"></div>
                            <div class="col-5"><button class="btn btn-sm btn-outline-primary w-100">Thêm giá trị</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-light">Chưa có thuộc tính phù hợp.</div>
    @endforelse
</div>
@endsection
