@extends('layouts.master')

@section('content')
@php
    $currentOrderId = request()->route('id') ?? request()->route('order') ?? (isset($order) ? $order->id : null);
@endphp
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action {{ request()->routeIs('account.profile') ? 'active' : '' }}">
                        <i class="fa fa-user"></i> Thông tin cá nhân
                    </a>
                    <a href="{{ route('cart.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                        <i class="fa fa-shopping-cart"></i> Giỏ hàng
                    </a>
                    <a href="{{ $currentOrderId ? route('account.order.detail', $currentOrderId) : route('orders.tracking') }}" class="list-group-item list-group-item-action {{ request()->routeIs('account.order.detail') || request()->routeIs('orders.tracking.show') ? 'active' : '' }}">
                        <i class="fa fa-clipboard"></i> Đơn hàng của tôi
                    </a>
                    <a href="{{ $currentOrderId ? route('orders.tracking.returns', $currentOrderId) : route('orders.tracking') }}" class="list-group-item list-group-item-action {{ request()->routeIs('orders.tracking.returns') ? 'active' : '' }}">
                        <i class="fa fa-clipboard"></i> Trả hàng
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="list-group-item list-group-item-action w-100 text-start">
                            <i class="fa fa-sign-out"></i> Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                @yield('customer-content')
            </div>
        </div>
    </div>
</div>
@endsection
