@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Chi tiết đơn hàng #{{ $order->id }}</h3>
            <p class="text-subtitle text-muted mb-0">Theo dõi thông tin và trạng thái của đơn hàng.</p>
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
                    <p><strong>Khách hàng:</strong> {{ $order->tenkhachhang }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->sdt }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->diachi }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->tongtien) }} ₫</p>
                    <p><strong>Trạng thái hiện tại:</strong> <span class="badge bg-light-primary text-primary">{{ $order->trangthai }}</span></p>

                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}" class="mt-4">
                        @csrf
                        @method('PUT')
                        <label class="form-label">Cập nhật trạng thái</label>
                        <div class="d-flex gap-2 flex-wrap">
                            <select name="trangthai" class="form-select w-auto">
                                <option value="0" {{ $order->trangthai == 0 ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="1" {{ $order->trangthai == 1 ? 'selected' : '' }}>Đang giao</option>
                                <option value="2" {{ $order->trangthai == 2 ? 'selected' : '' }}>Hoàn thành</option>
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
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->soLuong }}</td>
                                    <td>{{ number_format($item->donGia) }} ₫</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
