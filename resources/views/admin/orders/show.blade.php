@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Chi tiết đơn hàng #{{ $order->id }}</h3>
            <p class="text-subtitle text-muted mb-0">Xem chi tiết và cập nhật trạng thái đơn hàng.</p>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
            Quay lại
        </a>
    </div>
</div>

<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="row">
        <div class="col-12 col-lg-7">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin khách hàng</h4>
                </div>

                <div class="card-body">
                    <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                    <p><strong>Email:</strong> {{ $order->email ?? 'Không có' }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                    <p><strong>Ghi chú:</strong> {{ $order->note ?? 'Không có' }}</p>
                    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Sản phẩm trong đơn</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>SKU</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($order->items as $item)
                                    @php
                                        $variant = $item->variant;
                                        $product = $variant?->product;
                                        $lineTotal = $item->quantity * $item->price;
                                    @endphp

                                    <tr>
                                        <td>
                                            <strong>{{ $product->name ?? 'Sản phẩm không tồn tại' }}</strong>
                                        </td>

                                        <td>{{ $variant->sku ?? 'Không có' }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>

                                        <td>{{ number_format($lineTotal, 0, ',', '.') }} ₫</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Không có sản phẩm trong đơn hàng.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <h5>
                            Tổng tiền:
                            <strong class="text-danger">
                                {{ number_format($order->total_price, 0, ',', '.') }} ₫
                            </strong>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thanh toán</h4>
                </div>

                <div class="card-body">
                    <p><strong>Phương thức:</strong> {{ strtoupper($order->payment_method) }}</p>
                    <p><strong>Mã giao dịch:</strong> {{ $order->transaction_no ?? 'Chưa có' }}</p>
                    <p><strong>Ngân hàng:</strong> {{ $order->bank_code ?? 'Chưa có' }}</p>
                    <p><strong>Thời gian thanh toán:</strong>
                        {{ $order->paid_at ? \Carbon\Carbon::parse($order->paid_at)->format('d/m/Y H:i') : 'Chưa thanh toán' }}
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cập nhật trạng thái</h4>
                </div>

                <div class="card-body">
                    <p>
                        <strong>Trạng thái hiện tại:</strong>

                        @switch($order->status)
                            @case('pending')
                                <span class="badge bg-warning">Nhận đơn</span>
                                @break

                            @case('confirmed')
                                <span class="badge bg-info">Đã xác nhận</span>
                                @break

                            @case('shipping')
                                <span class="badge bg-primary">Đang giao</span>
                                @break

                            @case('completed')
                                <span class="badge bg-success">Hoàn thành</span>
                                @break

                            @case('cancelled')
                                <span class="badge bg-danger">Đã hủy</span>
                                @break

                            @default
                                <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endswitch
                    </p>

                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                        @csrf
                        @method('PUT')

                        <label class="form-label">Chọn trạng thái mới</label>

                        <select name="status" class="form-select mb-3" required>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                Nhận đơn
                            </option>

                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>
                                Đã xác nhận
                            </option>

                            <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>
                                Đang giao
                            </option>

                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                Hoàn thành
                            </option>

                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                Đã hủy
                            </option>
                        </select>

                        <button type="submit" class="btn btn-primary w-100">
                            Lưu trạng thái
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection