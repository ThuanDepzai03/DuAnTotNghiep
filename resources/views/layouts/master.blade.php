<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AE Phoenic Store</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <header>
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0987 654 321</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> aephoenic@gmail.com</a></li>
                </ul>
                <ul class="header-links pull-right">
                    @php $customer = session('customer'); @endphp
                    @if($customer)
                        @if((int) $customer['role'] === 0)
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <li><a href="{{ route('account.profile') }}"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="{{ route('account.profile') }}"><i class="fa fa-clipboard"></i> Đơn hàng</a></li>
                        @else
                            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-cogs"></i> Quản trị</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 d-flex align-items-center">
                        <div class="header-logo d-flex align-items-center">
                            <a href="{{ route('home') }}" class="logo d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('img/logo.png') }}" alt="AE Phoenic" style="height:40px; margin-right:10px;">
                                <h3 style="margin:0;">AE PHOENIC</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                   <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
    <a href="{{ route('home') }}">Trang chủ</a>
</li>

<li class="{{ request()->routeIs('shop') ? 'active' : '' }}">
    <a href="{{ route('shop') }}">Cửa hàng</a>
</li>

<li class="{{ request()->routeIs('about') ? 'active' : '' }}">
    <a href="{{ route('about') }}">Giới thiệu</a>
</li>

<li class="{{ request()->routeIs('news') ? 'active' : '' }}">
    <a href="{{ route('news') }}">Tin tức</a>
</li>

<li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
    <a href="{{ route('contact') }}">Liên hệ</a>
</li>
                    @php $customer = session('customer'); @endphp
                    @if($customer && (int) $customer['role'] === 1)
                        <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
