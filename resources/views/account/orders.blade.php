@extends('customer.layout')

@section('customer-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Đơn hàng đã đặt</h4>
        <a href="{{ route('account.profile') }}" class="btn btn-sm btn-secondary">Quay lại hồ sơ</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Ảnh SP</th>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>
                                <img src="{{ asset($order->product_image ?? 'img/product01.png') }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td><strong>#{{ $order->id }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($order->ngaygiodat)->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->tongtien, 0, ',', '.') }} ₫</td>
                            <td>
                                @php
                                    $statusClass = [
                                        'Đã đặt hàng' => 'bg-secondary',
                                        'Xác nhận đơn hàng' => 'bg-info',
                                        'Đang giao' => 'bg-warning text-dark',
                                        'Giao thành công' => 'bg-success',
                                        'Đã hủy' => 'bg-danger'
                                    ][$order->trangthai] ?? 'bg-primary';
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $order->trangthai }}</span>
                            </td>
                            <td>
                                <a href="{{ route('account.order.detail', $order->id) }}" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Bạn chưa có đơn hàng nào.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection