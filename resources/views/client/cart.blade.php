@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Giỏ hàng của bạn</h3>
                </div>
            </div>

            @if (session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if (count($cart) > 0)
                <div class="col-md-8">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tạm tính</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart as $item)
                                        @php
                                            $imgPath = $item['image'] ?? 'img/product01.png';

                                            if (preg_match('#^https?://#', $imgPath)) {
                                                $imgSrc = $imgPath;
                                            } else {
                                                $imgSrc = asset($imgPath);
                                            }
                                        @endphp

                                        <tr>
                                            <td style="min-width: 280px;">
                                                <div style="display: flex; gap: 12px; align-items: center;">
                                                    <img
                                                        src="{{ $imgSrc }}"
                                                        alt="{{ $item['name'] }}"
                                                        style="width: 70px; height: 70px; object-fit: cover;"
                                                        onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                                    >

                                                    <div>
                                                        <strong>{{ $item['name'] }}</strong>

                                                        <p style="margin: 5px 0 0; font-size: 12px;">
                                                            {{ $item['attributes'] }}
                                                        </p>

                                                        <small>Mã SP: {{ $item['sku'] }}</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <strong style="color: #D10024;">
                                                    {{ number_format($item['price'], 0, ',', '.') }} ₫
                                                </strong>

                                                @if ($item['old_price'])
                                                    <br>
                                                    <del>
                                                        {{ number_format($item['old_price'], 0, ',', '.') }} ₫
                                                    </del>
                                                @endif
                                            </td>

                                            <td style="width: 120px;">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    max="{{ $item['stock'] }}"
                                                    name="quantities[{{ $item['variant_id'] }}]"
                                                    value="{{ $item['quantity'] }}"
                                                    class="form-control"
                                                >
                                            </td>

                                            <td>
                                                <strong>
                                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫
                                                </strong>
                                            </td>

                                            <td>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf

                                                    <input
                                                        type="hidden"
                                                        name="product_variant_id"
                                                        value="{{ $item['variant_id'] }}"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Bạn muốn xóa sản phẩm này?')"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="primary-btn">
                            <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                        </button>

                        <a href="{{ route('shop') }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Tiếp tục mua hàng
                        </a>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="aside">
                        <h3 class="aside-title">Tổng đơn hàng</h3>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                            <span>Số lượng:</span>
                            <strong>{{ $totalQuantity }} sản phẩm</strong>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 18px;">
                            <span>Tổng tiền:</span>
                            <strong style="color: #D10024;">
                                {{ number_format($totalPrice, 0, ',', '.') }} ₫
                            </strong>
                        </div>

                        <a
                            href="{{ route('checkout.show') }}"
                            class="primary-btn"
                            style="display: block; text-align: center; margin-top: 20px;"
                        >
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        <h4>Giỏ hàng của bạn đang trống.</h4>

                        <a href="{{ route('shop') }}" class="primary-btn">
                            Đi mua sắm ngay
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
