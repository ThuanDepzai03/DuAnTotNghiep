@extends('layouts.master')

@section('content')
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
                    <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action">
                        <i class="fa fa-clipboard"></i> Đơn hàng của tôi
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
