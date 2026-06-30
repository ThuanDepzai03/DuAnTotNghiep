@extends('layouts.master')

@section('content')
@php 
// Lấy giỏ hàng từ Laravel Session
$cart = session('cart', []);
$tongTien = 0;
foreach ($cart as $item) {
    $tongTien += $item['price'] * $item['soLuong'];
}
@endphp

<div class="container my-5">
    <h1 class="mb-4 text-center">🛒 Giỏ Hàng Của Bạn</h1>
    <div class="card shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Các Sản Phẩm Trong Giỏ</h5>
        </div>
        <div class="card-body p-0">
            <table class="table align-middle table-borderless m-0">
                <thead class="bg-light">
                    <tr>
                        <th class="col-5">Sản Phẩm</th>
                        <th class="text-center col-2">Đơn Giá</th>
                        <th class="text-center col-2">Số Lượng</th>
                        <th class="text-end col-2">Thành Tiền</th>
                        <th class="text-center col-1">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin/' . $item['img']) }}" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div><h6 class="mb-0">{{ $item['name'] }}</h6></div>
                            </div>
                        </td>
                        <td class="text-center fw-bold text-success">{{ number_format($item['price']) }}₫</td>
                        <td class="text-center">
                            <form action="{{ route('cart.update') }}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="qty" min="1" value="{{ $item['soLuong'] }}" class="form-control text-center" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">Lưu</button>
                            </form>
                        </td>
                        <td class="text-end fw-bold text-danger">{{ number_format($item['price'] * $item['soLuong']) }}₫</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Tổng tiền:</td>
                        <td class="text-end fw-bold text-danger">{{ number_format($tongTien) }}₫</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="mt-4 text-end">
        <a href="{{ route('checkout.show') }}" class="btn btn-primary btn-lg">Thanh Toán</a>
    </div>
</div>
@endsection