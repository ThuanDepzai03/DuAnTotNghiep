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
                    @forelse($order->items as $item)
                        @php
                            $variant = $item->variant;
                            $product = $variant?->product;
                            $lineTotal = $item->quantity * $item->price;
                            $images = $product?->images ?? [];
                            $image = $images->first();
                        @endphp

                        <div class="d-flex gap-3 mb-4 pb-3 border-bottom">
                            <!-- Ảnh sản phẩm -->
                            <div style="flex-shrink: 0;">
                                @if($image && $image->image_url)
                                    <img src="{{ asset('storage/' . $image->image_url) }}" 
                                         alt="{{ $product->name }}"
                                         style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <div style="width: 100px; height: 100px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 4px; color: #999;">
                                        Không có ảnh
                                    </div>
                                @endif
                            </div>

                            <!-- Thông tin sản phẩm -->
                            <div class="flex-grow-1">
                                <h6 class="mb-2">{{ $product->name ?? 'Sản phẩm không tồn tại' }}</h6>
                                <p class="mb-1 small text-muted"><strong>SKU:</strong> {{ $variant->sku ?? 'Không có' }}</p>
                                <p class="mb-1 small text-muted"><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                                <p class="mb-1 small text-muted"><strong>Đơn giá:</strong> {{ number_format($item->price, 0, ',', '.') }} ₫</p>
                                <p class="mb-0"><strong>Thành tiền:</strong> <span class="text-danger">{{ number_format($lineTotal, 0, ',', '.') }} ₫</span></p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Không có sản phẩm trong đơn hàng.</p>
                    @endforelse

                    <div class="text-end mt-3 pt-3 border-top">
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
                    <h4 class="card-title mb-0">Thông tin thanh toán</h4>
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        <strong>Phương thức thanh toán:</strong>
                        @if($order->payment_method === 'cod')
                            <span class="badge bg-info">Thanh toán khi nhận hàng (COD)</span>
                        @elseif($order->payment_method === 'vnpay')
                            <span class="badge bg-success">VNPay</span>
                        @else
                            <span class="badge bg-secondary">{{ strtoupper($order->payment_method) }}</span>
                        @endif
                    </p>

                    @if($order->payment_method === 'vnpay')
                        <p class="mb-2">
                            <strong>Mã giao dịch:</strong> 
                            <code>{{ $order->transaction_no ?? 'Chưa có' }}</code>
                        </p>
                        <p class="mb-2">
                            <strong>Ngân hàng:</strong> {{ $order->bank_code ?? 'Chưa có' }}
                        </p>
                    @endif

                    <p class="mb-0">
                        <strong>Thời gian thanh toán:</strong>
                        @if($order->payment_method === 'cod')
                            @if($order->status === 'completed')
                                {{ \Carbon\Carbon::parse($order->completed_at)->format('d/m/Y H:i') ?? 'Đang cập nhật' }}
                            @else
                                <span class="text-muted">Đang cập nhật</span>
                            @endif
                        @else
                            {{ $order->paid_at ? \Carbon\Carbon::parse($order->paid_at)->format('d/m/Y H:i') : 'Chưa thanh toán' }}
                        @endif
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