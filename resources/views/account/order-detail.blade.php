@extends('customer.layout')

@section('customer-content')
@php
    $steps = [
        'pending' => [
            'label' => 'Đã nhận đơn',
            'icon' => 'bi-bag-check',
        ],
        'confirmed' => [
            'label' => 'Đã xác nhận',
            'icon' => 'bi-check-circle',
        ],
        'shipping' => [
            'label' => 'Đang giao',
            'icon' => 'bi-truck',
        ],
        'completed' => [
            'label' => 'Hoàn thành',
            'icon' => 'bi-patch-check',
        ],
    ];

    $statusIndex = [
        'pending' => 0,
        'confirmed' => 1,
        'shipping' => 2,
        'completed' => 3,
    ];

    $currentIndex = $statusIndex[$order->status] ?? -1;

    $statusText = [
        'pending' => 'Đã nhận đơn',
        'confirmed' => 'Đã xác nhận',
        'shipping' => 'Đang giao',
        'completed' => 'Hoàn thành',
        'cancelled' => 'Đã hủy',
    ];

    $statusClass = [
        'pending' => 'warning',
        'confirmed' => 'info',
        'shipping' => 'primary',
        'completed' => 'success',
        'cancelled' => 'danger',
    ];
@endphp

<style>
    .order-step {
        position: relative;
        text-align: center;
        flex: 1;
    }

    .order-step:not(:last-child)::after {
        content: "";
        position: absolute;
        top: 22px;
        left: 50%;
        width: 100%;
        height: 3px;
        background: #dee2e6;
        z-index: 0;
    }

    .order-step.active:not(:last-child)::after {
        background: #198754;
    }

    .step-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #dee2e6;
        color: #6c757d;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        font-size: 22px;
        margin-bottom: 8px;
    }

    .order-step.active .step-icon {
        background: #198754;
        color: #fff;
    }

    .info-row {
        display: flex;
        margin-bottom: 10px;
    }

    .info-label {
        width: 160px;
        font-weight: 600;
        color: #333;
    }

    .info-value {
        flex: 1;
    }

    .product-img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #eee;
    }
</style>

<div class="card mb-4">
    <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h4 class="mb-1">Chi tiết đơn hàng #{{ $order->id }}</h4>
            <div class="text-muted">
                Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('account.profile') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Quay lại
            </a>

            <span class="badge bg-{{ $statusClass[$order->status] ?? 'secondary' }} fs-6 px-3 py-2">
                {{ $statusText[$order->status] ?? $order->status }}
            </span>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($order->status === 'cancelled')
    <div class="alert alert-danger">
        Đơn hàng này đã được hủy.
    </div>
@else
   <div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Trạng thái đơn hàng</h5>
    </div>

    <div class="card-body">

        @switch($order->status)

            @case('pending')
                <span class="badge bg-warning fs-6 px-3 py-2">
                    🟡 Đã nhận đơn
                </span>
                @break

            @case('confirmed')
                <span class="badge bg-info fs-6 px-3 py-2">
                    🔵 Đã xác nhận
                </span>
                @break

            @case('shipping')
                <span class="badge bg-primary fs-6 px-3 py-2">
                    🚚 Đang giao hàng
                </span>
                @break

            @case('completed')
                <span class="badge bg-success fs-6 px-3 py-2">
                    ✅ Hoàn thành
                </span>
                @break

            @case('cancelled')
                <span class="badge bg-danger fs-6 px-3 py-2">
                    ❌ Đã hủy
                </span>
                @break

            @default
                <span class="badge bg-secondary fs-6 px-3 py-2">
                    {{ $order->status }}
                </span>

        @endswitch

    </div>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Thông tin người nhận</h5>
            </div>

            <div class="card-body">
                <div class="info-row">
                    <div class="info-label">Khách hàng</div>
                    <div class="info-value">{{ $order->customer_name }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Số điện thoại</div>
                    <div class="info-value">{{ $order->phone }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $order->email ?? 'Không có' }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Địa chỉ</div>
                    <div class="info-value">{{ $order->address }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Ghi chú</div>
                    <div class="info-value">{{ $order->note ?? 'Không có' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Thông tin thanh toán</h5>
            </div>

            <div class="card-body">
                <div class="info-row">
                    <div class="info-label">Phương thức</div>
                    <div class="info-value">{{ strtoupper($order->payment_method) }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Mã giao dịch</div>
                    <div class="info-value">{{ $order->transaction_no ?? 'Chưa có' }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Ngân hàng</div>
                    <div class="info-value">{{ $order->bank_code ?? 'Chưa có' }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Thời gian thanh toán</div>
                    <div class="info-value">
                        {{ $order->paid_at ? \Carbon\Carbon::parse($order->paid_at)->format('d/m/Y H:i') : 'Chưa thanh toán' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Sản phẩm trong đơn</h5>
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
                            $lineTotal = $item->price * $item->quantity;

                            $image = $variant->image
                                ?? $product->img
                                ?? $product->image
                                ?? null;

                            if ($image) {
                                $imageSrc = preg_match('#^https?://#', $image)
                                    ? $image
                                    : asset($image);
                            } else {
                                $imageSrc = asset('img/product01.png');
                            }
                        @endphp

                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img
                                        src="{{ $imageSrc }}"
                                        class="product-img"
                                        alt="{{ $product->name ?? 'Sản phẩm' }}"
                                        onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                    >

                                    <div>
                                        <strong>{{ $product->name ?? 'Sản phẩm không tồn tại' }}</strong>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $variant->sku ?? 'Không có' }}</td>

                            <td>{{ $item->quantity }}</td>

                            <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>

                            <td>
                                <strong>
                                    {{ number_format($lineTotal, 0, ',', '.') }} ₫
                                </strong>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Không có sản phẩm trong đơn hàng.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-end mt-4">
            <div class="text-muted">Tổng thanh toán</div>
            <h3 class="text-danger">
                {{ number_format($order->total_price, 0, ',', '.') }} ₫
            </h3>
        </div>

        @if($order->status === 'pending')
            <form
                action="{{ route('account.order.cancel', $order->id) }}"
                method="POST"
                class="mt-3 text-end"
                onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')"
            >
                @csrf
                @method('PUT')

                <button class="btn btn-danger">
                    Hủy đơn hàng
                </button>
            </form>
        @endif
    </div>
</div>
@endsection