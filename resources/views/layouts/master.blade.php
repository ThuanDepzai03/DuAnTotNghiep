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

                        <div class="search-input-wrapper">
                            <input
                                id="header-search-input"
                                type="search"
                                name="keyword"
                                value="{{ request('keyword') }}"
                                placeholder="Tìm kiếm sản phẩm..."
                                autocomplete="off"
                                class="search-input"
                            >

                            <!-- Dropdown gợi ý -->
                            <div id="search-suggestions" class="search-suggestions"></div>
                        </div>

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

    <!-- Search Suggestions CSS -->
    <style>
    .search-input {
        color: #000 !important;
    }

    .search-input::placeholder {
        color: #999 !important;
    }

    /* Khối tìm kiếm phải nằm trên menu */
    .top-header-search {
        position: relative !important;
        z-index: 99999 !important;
    }

    .header-search-form {
        position: relative !important;
        z-index: 99999 !important;
    }

    .search-input-wrapper {
        position: relative !important;
        width: 100%;
        overflow: visible !important;
        z-index: 99999 !important;
    }

    /* Dropdown kết quả */
    .search-suggestions {
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;

        background: #fff !important;
        border: 1px solid #ddd;
        border-top: none;

        max-height: 400px;
        overflow-y: auto;

        display: none;

        /* QUAN TRỌNG */
        z-index: 999999 !important;

        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
    }

    .search-suggestions.active {
        display: block !important;
    }

    .suggestion-item {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;

        display: flex;
        align-items: center;
        gap: 12px;

        transition: background-color 0.2s;

        text-decoration: none;
        color: inherit;

        background: #fff;
    }

    .suggestion-item:hover {
        background-color: #f9f9f9;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .suggestion-content {
        flex: 1;
        min-width: 0;
    }

    .suggestion-name {
        font-weight: 500;
        color: #333;

        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;

        font-size: 14px;
    }

    .suggestion-price {
        color: #f53003;
        font-weight: 600;
        font-size: 13px;
    }

    .suggestion-empty {
        padding: 20px 15px;
        text-align: center;
        color: #999;
        background: #fff;
    }

    /* Header không được cắt dropdown */
    header,
    .header,
    .main-header,
    .top-header {
        overflow: visible !important;
    }

    /* Menu vẫn ở dưới dropdown */
    .main-nav,
    .navigation,
    nav,
    .navbar {
        position: relative;
        z-index: 100 !important;
    }
    /* =====================================================
   FIX DROPDOWN TÌM KIẾM
===================================================== */

/* Header tổng */
.site-header {
    position: relative !important;
    z-index: 99999 !important;
}

/* Hàng trên */
#top-header {
    position: relative !important;
    z-index: 99999 !important;
    overflow: visible !important;
}

/* Container hàng trên */
.top-header-inner {
    position: relative !important;
    z-index: 99999 !important;
}

/* Khu vực tìm kiếm */
.top-header-search {
    position: relative !important;
    z-index: 999999 !important;
}

/* Form tìm kiếm */
.header-search-form {
    position: relative !important;
    z-index: 999999 !important;
}

/* Wrapper input */
.search-input-wrapper {
    position: relative !important;
    width: 100%;
    overflow: visible !important;
    z-index: 999999 !important;
}

/* Dropdown */
.search-suggestions {
    position: absolute !important;

    top: 100% !important;
    left: 0 !important;
    right: 0 !important;

    background: #fff !important;

    border: 1px solid #ddd !important;
    border-top: none !important;

    max-height: 400px;
    overflow-y: auto;

    display: none;

    z-index: 9999999 !important;

    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);

    color: #222;
}

/* Khi JS mở dropdown */
.search-suggestions.active {
    display: block !important;
}

/* Menu phía dưới */
#navigation {
    position: relative !important;
    z-index: 100 !important;
    overflow: visible !important;
}

/* Các phần tử cha không được cắt dropdown */
.site-header,
#top-header,
#top-header .container,
.top-header-inner,
.top-header-search,
.header-search-form,
.search-input-wrapper,
#navigation,
#navigation .container,
#responsive-nav {
    overflow: visible !important;
}
/* FIX KHOẢNG TRẮNG PHÍA TRÊN HEADER */
body {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

.site-header {
    margin-top: 0 !important;
    padding-top: 0 !important;
    top: 0 !important;
}

#top-header {
    margin-top: 0 !important;
    padding-top: 0 !important;
}
</style>

    <!-- Search Suggestions JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('header-search-input');
            const suggestionsContainer = document.getElementById('search-suggestions');
            let debounceTimer;

            searchInput.addEventListener('input', function() {
                clearTimeout(debounceTimer);
                const keyword = this.value.trim();

                if (keyword.length === 0) {
                    suggestionsContainer.classList.remove('active');
                    suggestionsContainer.innerHTML = '';
                    return;
                }

                debounceTimer = setTimeout(function() {
                    fetchSuggestions(keyword);
                }, 300);
            });

            // Ẩn gợi ý khi click ra ngoài
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.top-header-search')) {
                    suggestionsContainer.classList.remove('active');
                }
            });

            function fetchSuggestions(keyword) {
                fetch(`{{ route('api.search.suggestion') }}?keyword=${encodeURIComponent(keyword)}`)
                    .then(response => response.json())
                    .then(data => {
                        displaySuggestions(data);
                    })
                    .catch(error => {
                        console.error('Error fetching suggestions:', error);
                    });
            }

            function displaySuggestions(products) {
                if (products.length === 0) {
                    suggestionsContainer.innerHTML = '<div class="suggestion-empty">Không tìm thấy sản phẩm</div>';
                    suggestionsContainer.classList.add('active');
                    return;
                }

                suggestionsContainer.innerHTML = products.map(product => `
                    <a href="${product.url}" class="suggestion-item">
                        <img src="${product.image}" alt="${product.name}" class="suggestion-image">
                        <div class="suggestion-content">
                            <div class="suggestion-name">${product.name}</div>
                            <div class="suggestion-price">${formatPrice(product.price)}</div>
                        </div>
                    </a>
                `).join('');
                suggestionsContainer.classList.add('active');
            }

            function formatPrice(price) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(price);
            }
        });
    </script>

 <script>
        var CHAT_ROUTE = "{{ route('chat.send') }}";
    </script>
    <script src="{{ asset('js/chat.js') }}?v={{ time() }}"></script>
</body>
</html>
<!-- ádsdaas -->
 <!-- ádsdaas -->
   <!-- ádsdaas -->
     <!-- ádsdaas -->