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
                <div class="alert alert-success py-2">
                    {{ session('success') }}
                </div>
            @endif

            <button class="btn btn-primary">
                Lưu thay đổi
            </button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">Đơn hàng của tôi</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Phương thức</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ strtoupper($order->payment_method) }}
                            </td>

                            <td>
                                {{ number_format($order->total_price, 0, ',', '.') }} ₫
                            </td>

                            <td>
    @switch($order->status)
        @case('pending')
            <span class="badge bg-warning">Đã nhận đơn</span>
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
</td>
                            <td>

    <a href="{{ route('account.order.detail',$order->id) }}"
        class="btn btn-sm btn-primary">

        Chi tiết

    </a>

    @if($order->status=='pending')

        <form
            action="{{ route('account.order.cancel',$order->id) }}"
            method="POST"
            style="display:inline">

            @csrf
            @method('PUT')

            <button
                onclick="return confirm('Bạn chắc chắn muốn hủy đơn?')"
                class="btn btn-sm btn-danger">

                Hủy

            </button>

        </form>

    @endif

</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">
                                Bạn chưa có đơn hàng nào.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection