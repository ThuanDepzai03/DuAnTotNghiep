<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AE Phoenic Store</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">

    <link rel="stylesheet" href="views/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="views/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="views/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="views/assets/css/app.css">
    <link rel="stylesheet" href="views/assets/css/custom.css">
    <link rel="shortcut icon" href="views/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="?index.php?action=dashboard"><img src="views/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= (!isset($_GET['action']) || $_GET['action'] == 'dashboard') ? 'active' : '' ?>">
                            <a href="index.php?action=dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (isset($_GET['action']) && str_contains($_GET['action'], 'danhmuc')) ? 'active' : '' ?>">
                            <a href="index.php?action=listdanhmuc" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Danh mục</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (isset($_GET['action']) && str_contains($_GET['action'], 'sanpham')) ? 'active' : '' ?>">
                            <a href="index.php?action=listsanpham" class='sidebar-link'>
                                <i class="bi bi-phone"></i>
                                <span>Sản phẩm</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (isset($_GET['action']) && $_GET['action'] == 'createuser') ? 'active' : '' ?>">
                            <a href="index.php?action=createuser" class='sidebar-link'>
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Thêm tài khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (isset($_GET['action']) && ($_GET['action'] == 'listuser' || $_GET['action'] == 'edituser')) ? 'active' : '' ?>">
                            <a href="index.php?action=listuser" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Danh sách tài khoản</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (isset($_GET['action']) && ($_GET['action'] == 'listhoadon' || $_GET['action'] == 'chitiethoadon')) ? 'active' : '' ?>">
                            <a href="index.php?action=listhoadon" class='sidebar-link'>
                                <i class="bi bi-receipt"></i>
                                <span>Danh sách hoá đơn</span>
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