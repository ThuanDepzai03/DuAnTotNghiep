<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AE Phoenic Store</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
<link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-ui.css') }}" />
</head>
<body>
    <header class="site-header">

    {{-- =====================================================
         HÀNG 1: LOGO + TÌM KIẾM + TÀI KHOẢN
    ====================================================== --}}
    <div id="top-header">
        <div class="container">
            <div class="top-header-inner">

                {{-- LOGO --}}
                <div class="top-header-logo">
                    <a href="{{ route('home') }}"
                       class="brand-logo"
                       aria-label="AE Phoenic Store">

                        <img src="{{ asset('img/logo.png') }}"
                             alt="AE Phoenic"
                             class="brand-logo__img">

                        <span class="brand-logo__text">
                            AE PHOENIC
                        </span>
                    </a>
                </div>


                {{-- TÌM KIẾM --}}
                <div class="top-header-search">
                    <form action="{{ route('shop') }}"
                          method="GET"
                          class="header-search-form">

                        <label class="sr-only" for="header-search-input">
                            Tìm kiếm sản phẩm
                        </label>

                        <input
                            id="header-search-input"
                            type="search"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Tìm kiếm sản phẩm..."
                            autocomplete="off"
                        >

                        <button type="submit" aria-label="Tìm kiếm">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>

                    </form>
                </div>


                {{-- CÁC CHỨC NĂNG --}}
                <div class="top-header-actions">

                    @php
                        $customer = session('customer');
                    @endphp

                    {{-- GIỎ HÀNG --}}
                    <a href="{{ route('cart.index') }}"
                       class="header-action">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                    </a>


                    @if($customer)

                        {{-- KHÁCH HÀNG --}}
                        @if((int) $customer['role'] === 0)

                            <a href="{{ route('account.profile') }}"
                               class="header-action">
                                <i class="fa fa-user"></i>
                                <span>Tài khoản</span>
                            </a>

                            <a href="{{ route('orders.tracking') }}"
                               class="header-action">
                                <i class="fa fa-clipboard"></i>
                                <span>Đơn hàng</span>
                            </a>

                        @else

                            {{-- ADMIN --}}
                            <a href="{{ route('admin.dashboard') }}"
                               class="header-action">
                                <i class="fa fa-cogs"></i>
                                <span>Quản trị</span>
                            </a>

                        @endif


                        {{-- ĐĂNG XUẤT --}}
                        <form action="{{ route('logout') }}"
                              method="POST"
                              class="logout-form">
                            @csrf

                            <button type="submit"
                                    class="header-action header-action-button">

                                <i class="fa fa-sign-out"></i>
                                <span>Đăng xuất</span>

                            </button>
                        </form>


                    @else

                        {{-- CHƯA ĐĂNG NHẬP --}}
                        <a href="#"
                           id="btn-open-auth-modal"
                           class="header-action">

                            <i class="fa fa-sign-in"></i>
                            <span>Đăng ký/Đăng nhập</span>

                        </a>

                    @endif

                </div>

            </div>
        </div>
    </div>


    {{-- =====================================================
         HÀNG 2: MENU - GIỮ NGUYÊN
    ====================================================== --}}
    <nav id="navigation" aria-label="Primary navigation">

        <div class="container">

            <div id="responsive-nav">

                <ul class="main-nav nav navbar-nav">

                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            Trang chủ
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('shop') ? 'active' : '' }}">
                        <a href="{{ route('shop') }}">
                            Cửa hàng
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}">
                            Giới thiệu
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('news') ? 'active' : '' }}">
                        <a href="{{ route('news') }}">
                            Tin tức
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('compare.index') ? 'active' : '' }}">
                        <a href="{{ route('compare.index') }}">
                            So sánh 
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">
                            Liên hệ
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('vouchers.index') ? 'active' : '' }}">
                        <a href="{{ route('vouchers.index') }}">
                            Kho voucher
                        </a>
                    </li>

                    @php
                        $customer = session('customer');
                    @endphp

                    @if($customer && (int) $customer['role'] === 1)
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                Admin
                            </a>
                        </li>
                    @endif

                </ul>

            </div>

        </div>

    </nav>

</header>

    <main>
        @yield('content')
    </main>

   <footer id="footer" class="custom-footer">
    <div class="section">
        <div class="container">
            <div class="row">

                {{-- Giới thiệu --}}
                <div class="col-md-4 col-sm-6">
                    <div class="footer">
                        <h3 class="footer-title">VỀ CHÚNG TÔI</h3>

                        <p class="footer-about">
                            AE Phoenic Store chuyên cung cấp điện thoại, máy tính bảng
                            và phụ kiện chính hãng với giá tốt, bảo hành rõ ràng.
                        </p>

                        <ul class="footer-links">
                            <li>
                                <a href="tel:0987654321">
                                    <i class="fa fa-phone"></i>
                                    0987 654 321
                                </a>
                            </li>

                            <li>
                                <a href="mailto:aephoenic@gmail.com">
                                    <i class="fa fa-envelope-o"></i>
                                    aephoenic@gmail.com
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>
                                    Hải Phòng, Việt Nam
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Chính sách --}}
                <div class="col-md-2 col-sm-6">
                    <div class="footer">
                        <h3 class="footer-title">CHÍNH SÁCH</h3>

                        <ul class="footer-links">
                            <li><a href="#">Chính sách bảo hành</a></li>
                            <li><a href="#">Chính sách đổi trả</a></li>
                            <li><a href="#">Chính sách giao hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Hỗ trợ --}}
                <div class="col-md-2 col-sm-6">
                    <div class="footer">
                        <h3 class="footer-title">HỖ TRỢ</h3>

                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('shop') }}">Cửa hàng</a></li>
                            <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Fanpage --}}
                <div class="col-md-4 col-sm-6">
                    <div class="footer">
                        <h3 class="footer-title">KẾT NỐI VỚI CHÚNG TÔI</h3>

                        <p class="footer-about">
                            Theo dõi AE Phoenic Store để nhận thông tin khuyến mãi
                            và sản phẩm mới sớm nhất.
                        </p>

                        <div class="footer-social">
                            <a href="#" class="facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="youtube">
                                <i class="fa fa-youtube"></i>
                            </a>

                            <a href="#" class="instagram">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <a href="#" class="tiktok">
                                <i class="fa fa-music"></i>
                            </a>
                        </div>

                        <div class="footer-payment">
                            <span>Thanh toán:</span>
                            <i class="fa fa-cc-visa"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
                        © {{ date('Y') }} AE Phoenic Store. Bản quyền thuộc về nhóm DATN.
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
@include('layouts.chat')
    @include('client.partials.rotating_ad')

    @include('client.partials.auth_modal')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app-interactions.js') }}?v={{ filemtime(public_path('js/app-interactions.js')) }}"></script>
 <script>
        var CHAT_ROUTE = "{{ route('chat.send') }}";
    </script>
    <script src="{{ asset('js/chat.js') }}?v={{ time() }}"></script>
</body>
</html>
