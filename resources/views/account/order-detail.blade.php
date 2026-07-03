@extends('customer.layout')

@section('customer-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Chi tiết đơn hàng #{{ $order->id }}</h4>
        <a href="{{ route('account.orders') }}" class="btn btn-sm btn-secondary">Quay lại danh sách</a>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Ngày đặt:</strong> {{ \Carbon\Carbon::parse($order->ngaygiodat)->format('d/m/Y H:i') }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->tongtien, 0, ',', '.') }} ₫</p>
                    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method ?? 'Tiền mặt' }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Họ tên:</strong> {{ $order->tenkhachhang }}</p>
                    <p><strong>SĐT:</strong> {{ $order->sdt }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->diachi }}</p>
                </div>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="mb-5">
            <h5>Trạng thái đơn hàng</h5>
            <div class="timeline">
                @php
                    $statuses = [
                        ['label' => 'Đã đặt hàng', 'icon' => 'fa-check-circle'],
                        ['label' => 'Xác nhận đơn hàng', 'icon' => 'fa-phone'],
                        ['label' => 'Đang giao', 'icon' => 'fa-truck'],
                        ['label' => 'Giao thành công', 'icon' => 'fa-check']
                    ];
                    $currentStatusIndex = array_search($order->trangthai, array_column($statuses, 'label'));
                    $currentStatusIndex = $currentStatusIndex === false ? -1 : $currentStatusIndex;
                @endphp
                @foreach ($statuses as $index => $status)
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            @if ($index < $currentStatusIndex)
                                <i class="fas {{ $status['icon'] }} text-success"></i>
                            @elseif ($index == $currentStatusIndex)
                                <i class="fas {{ $status['icon'] }} text-primary"></i>
                            @else
                                <i class="far {{ $status['icon'] }} text-muted"></i>
                            @endif
                        </div>
                        <div class="timeline-content">
                            <h6>{{ $status['label'] }}</h6>
                            @if ($index == $currentStatusIndex && $order->trangthai == 'Đang giao')
                                <small class="text-muted">Đang trên đường đến bạn</small>
                            @elseif ($index == $currentStatusIndex && $order->trangthai == 'Giao thành công')
                                <small class="text-success">Đã giao hàng thành công</small>
                            @endif
                        </div>
                    </div>
                    @if (!$loop->last)
                        <div class="timeline-line"></div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Order Items -->
        <div class="mb-4">
            <h5>Sản phẩm trong đơn hàng</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item->hinh_anh ?? 'img/product01.png') }}"
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td>{{ $item->ten_san_pham }}</td>
                                <td>{{ number_format($item->gia, 0, ',', '.') }} ₫</td>
                                <td>{{ $item->so_luong }}</td>
                                <td>{{ number_format($item->thanh_tien, 0, ',', '.') }} ₫</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Không có sản phẩm</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
```\n\nNow let me enhance the product cards in shop.blade.php to show more details. I'll add things like SKU, short description, and maybe some attributes.\n``````tool\nTOOL_NAME: edit_existing_file\nBEGIN_ARG: filepath\n\"resources/views/client/shop.blade.php\""