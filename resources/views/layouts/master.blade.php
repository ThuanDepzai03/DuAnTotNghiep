<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro Store - Điện tử chính hãng</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>

    <header>
        <div class="header">
            <div class="container">
                <nav class="main-nav">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <a href="{{ route('shop') }}">Cửa hàng</a>
                    <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                    <a href="{{ route('about') }}">Về chúng tôi</a>
                    <a href="{{ route('contact') }}">Liên hệ</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright © 2026 Electro Store | Bùi Minh Thuận</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>