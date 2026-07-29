@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title" style="margin-bottom: 20px;">Theo dõi đơn hàng</h3>

                @if($orders->isEmpty())
                    <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hành trình</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : '-' }}</td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                                        <td>
                                            <span class="label" style="background:#d10024; color:#fff; padding:5px 10px; border-radius:4px;">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.tracking.show', $order->id) }}" class="primary-btn" style="padding:8px 12px;">Xem hành trình</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
