@extends('customer.layout')

@section('customer-content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Thông tin khách hàng</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input class="form-control" value="{{ $user->user }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="tel" class="form-control" value="{{ $user->tel }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ $user->address }}">
            </div>
            @if(session('success'))
                <div class="alert alert-success py-2">{{ session('success') }}</div>
            @endif
            <button class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">Đơn hàng đã đặt</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->ngaygiodat }}</td>
                            <td>{{ number_format($order->tongtien) }} ₫</td>
                            <td><span class="badge bg-primary">{{ $order->trangthai }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-muted">Bạn chưa có đơn hàng nào.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
