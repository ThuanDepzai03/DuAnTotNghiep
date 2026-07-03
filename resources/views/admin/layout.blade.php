<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AE Phoenic Store Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{ route('admin.dashboard') }}">
                            <img src="{{ asset('admin-assets/images/logo/logo.png') }}" alt="Logo" onerror="this.style.display='none'">
                        </a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            <span>Danh mục</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                            <i class="bi bi-phone"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Khách hàng</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.orders.index') }}" class="sidebar-link">
                            <i class="bi bi-receipt"></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3 class="mb-4">Hệ thống AE STORE</h3>
        </div>

        <div class="page-content">
            @yield('content')
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2025 © AE Phoenic Store</p>
                </div>
                <div class="float-end">
                    <p>Facebook admin <span class="text-danger"><i class="bi bi-heart"></i></span> : <a href="https://www.facebook.com/sad.boiz.see.tynk">Sơn Bùi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('admin-assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin-assets/js/main.js') }}"></script>
</body>
</html>
