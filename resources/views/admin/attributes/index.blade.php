@extends('admin.layout')
@section('content')
<div class="container-fluid py-3">
    <h3>Quản lý thuộc tính</h3>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card mb-4"><div class="card-body"><form method="POST" action="{{ route('admin.attributes.store') }}" class="row g-2">@csrf
        <div class="col-md-3"><input name="name" class="form-control" placeholder="Tên thuộc tính" required></div>
        <div class="col-md-2"><select name="input_type" class="form-select"><option value="select">Danh sách lựa chọn</option><option value="text">Nhập tự do</option><option value="number">Số</option><option value="boolean">Có/Không</option></select></div>
        <div class="col-md-5"><input name="values" class="form-control" placeholder="Giá trị, ngăn cách bằng dấu phẩy (nếu là danh sách)"></div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Thêm thuộc tính</button></div>
    </form></div></div>
    <div class="table-responsive"><table class="table table-striped align-middle"><thead><tr><th>Tên</th><th>Kiểu nhập</th><th>Giá trị lựa chọn</th><th>Trạng thái</th><th>Thao tác</th></tr></thead><tbody>
    @forelse($attributes as $attribute)<tr><td><strong>{{ $attribute->name }}</strong></td><td>{{ $attribute->input_type }}</td><td>{{ $attribute->values->pluck('value')->join(', ') ?: 'Nhập tự do' }}</td><td>{{ $attribute->is_active ? 'Đang dùng' : 'Đã ẩn' }}</td><td><form method="POST" action="{{ route('admin.attributes.destroy', $attribute) }}" onsubmit="return confirm('Ẩn thuộc tính này?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Ẩn</button></form></td></tr>@empty<tr><td colspan="5">Chưa có thuộc tính.</td></tr>@endforelse
    </tbody></table></div>
</div>
@endsection
