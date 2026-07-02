@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Chi tiết đơn hàng #{{ $order->id }}</h3>
            <p class="text-subtitle text-muted mb-0">Theo dõi thông tin và trạng thái đơn hàng.</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-7">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin đơn hàng</h4>
                </div>

                <div class="card-body">
                    <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                    <p><strong>Email:</strong> {{ $order->email ?? 'Không có' }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                    <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</p>
                    <p><strong>Mã giao dịch:</strong> {{ $order->transaction_no ?? 'Chưa có' }}</p>
                    <p><strong>Ngân hàng:</strong> {{ $order->bank_code ?? 'Chưa có' }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} ₫</p>

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
                        @endswitch
                    </p>

                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}" class="mt-4">
                        @csrf
                        @method('PUT')

                        <label class="form-label">Cập nhật trạng thái</label>

                        <div class="d-flex gap-2 flex-wrap">
                            <select name="status" class="form-select w-auto">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Nhận đơn</option>
                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Giao hàng</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                            </select>

                            <button class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Sản phẩm trong đơn</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Biến thể</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            {{ $item->variant->product->name ?? 'Sản phẩm' }}
                                        </td>

                                        <td>
                                            {{ $item->variant->sku ?? 'Không có' }}
                                        </td>

                                        <td>
                                            {{ $item->quantity }}
                                        </td>

                                        <td>
                                            {{ number_format($item->price, 0, ',', '.') }} ₫
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <h5 class="text-end">
                        Tổng tiền:
                        <strong>{{ number_format($order->total_price, 0, ',', '.') }} ₫</strong>
                    </h5>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection