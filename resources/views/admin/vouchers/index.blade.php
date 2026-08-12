@extends('admin.layout')

@section('content')

<div class="page-heading">

    <h3>Quản lý Voucher</h3>

</div>

<div class="page-content">

<div class="card">

<div class="card-header">

<a href="{{ route('admin.vouchers.create') }}"
class="btn btn-success">

+ Thêm Voucher

</a>

</div>

<div class="card-body">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>

<th>Mã</th>

<th>Tên</th>

<th>Loại</th>

<th>Giảm</th>

<th>Đơn tối thiểu</th>

<th>Số lượng</th>

<th>Trạng thái</th>

<th>Thao tác</th>

</tr>

</thead>

<tbody>

@foreach($vouchers as $voucher)

<tr>

<td>{{ $voucher->id }}</td>

<td>{{ $voucher->code }}</td>

<td>{{ $voucher->name }}</td>

<td>{{ $voucher->discount_type }}</td>

<td>{{ $voucher->discount_value }}</td>

<td>{{ number_format($voucher->min_order) }}</td>

<td>{{ $voucher->quantity }}</td>

<td>

@if($voucher->status)

<span class="badge bg-success">

Hoạt động

</span>

@else

<span class="badge bg-danger">

Ngừng

</span>

@endif

</td>

<td>

<a
href="{{ route('admin.vouchers.edit',$voucher->id) }}"
class="btn btn-warning btn-sm">

Sửa

</a>

<form
action="{{ route('admin.vouchers.destroy',$voucher->id) }}"
method="POST"
style="display:inline;">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm">

Xóa

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection