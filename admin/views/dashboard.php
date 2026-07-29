<?php include_once("views/layouts/header.php"); ?>

<div class="page-heading">
    <h3 class="mb-4">Hệ thống AE STORE</h3>
</div>

<div class="page-content">
    <div class="row mb-4">

        <!-- Đơn hàng -->
        <div class="col-12 col-lg-4 col-md-6">
            <a href="index.php?action=listhoadon" style="text-decoration:none">
                <div class="stats-card">
                    <div>
                        <h6 class="text-muted font-semibold">Đơn hàng</h6>
                        <h4 class="font-extrabold mb-0" style="color:#fff">
                            <?= number_format($countDonHang) ?>
                        </h4>
                    </div>
                    <div class="stats-icon" style="background: rgba(13, 202, 240, 0.2); color: #0dcaf0;">
                        <i class="bi bi-cart-check"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sản phẩm -->
        <div class="col-12 col-lg-4 col-md-6">
            <a href="index.php?action=listsanpham" style="text-decoration:none">
                <div class="stats-card">
                    <div>
                        <h6 class="text-muted font-semibold">Sản phẩm</h6>
                        <h4 class="font-extrabold mb-0" style="color:#fff">
                            <?= number_format($countSanPham) ?>
                        </h4>
                    </div>
                    <div class="stats-icon" style="background: rgba(255, 193, 7, 0.2); color: #ffc107;">
                        <i class="bi bi-phone"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Thành viên -->
        <div class="col-12 col-lg-4 col-md-6">
            <a href="index.php?action=listuser" style="text-decoration:none">
                <div class="stats-card">
                    <div>
                        <h6 class="text-muted font-semibold">Thành viên</h6>
                        <h4 class="font-extrabold mb-0" style="color:#fff">
                            <?= number_format($countUser) ?>
                        </h4>
                    </div>
                    <div class="stats-icon" style="background: rgba(255, 46, 99, 0.2); color: #ff2e63;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>


    <div class="row mb-4">

        <!-- Doanh thu hôm nay -->
        <div class="col-12 col-lg-4 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Doanh thu hôm nay</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff">
                        <?= number_format($doanhThuHomNay) ?> ₫
                    </h4>
                </div>
                <div class="stats-icon" style="background: rgba(255, 46, 99, 0.2); color: #ff2e63;">
                    <i class="bi bi-lightning-fill"></i>
                </div>
            </div>
        </div>

        <!-- Doanh thu tháng -->
        <div class="col-12 col-lg-4 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Doanh thu tháng</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff">
                        <?= number_format($doanhThuThang) ?> ₫
                    </h4>
                </div>
                <div class="stats-icon" style="background: rgba(25, 135, 84, 0.2); color: #198754;">
                    <i class="bi bi-cash-stack"></i>
                </div>
            </div>
        </div>

        <!-- Tổng doanh thu -->
        <div class="col-12 col-lg-4 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Tổng doanh thu</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff">
                        <?= number_format($tongDoanhThu) ?> ₫
                    </h4>
                </div>
                <div class="stats-icon" style="background: rgba(25, 135, 84, 0.2); color: #198754;">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: #1c1f2b; color: #fff;">
                <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
                    <h4 style="color: #fff;">Biểu đồ doanh thu 1 năm (12 tháng gần nhất)</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChartYear" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: #1c1f2b; color: #fff;">
                <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
                    <h4 style="color: #fff;">Biểu đồ doanh thu 1 tháng (30 ngày gần nhất)</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChartMonth" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: #1c1f2b; color: #fff;">
                <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
                    <h4 style="color: #fff;">Biểu đồ doanh thu 999 ngày gần nhất</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart999" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-4" style="border-left: 5px solid #ff2e63; padding-left: 15px;">Team AE Store</h4>
    <div class="row">
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/mthuan.jpg" class="member-img">
                <h5 class="member-name">Minh Thuận</h5>
                <span class="role-badge">Leader / Backend</span>
                <p class="member-task">Quản lý dự án, thiết kế database, thiết kế trang quản trị, thêm quản trị viên và quản lý người dùng, quản lý hóa đơn, trang quản trị Dark Mode.</p>
                <div class="social-links"><a href="https://www.facebook.com/Theplay.Hacker.ss"><i class="bi bi-facebook"></i></a><a href="https://github.com/ThuanDepzai03"><i class="bi bi-github"></i></a></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/dkiet.jpg" class="member-img">
                <h5 class="member-name">Đức Kiệt</h5>
                <span class="role-badge">Document</span>
                <p class="member-task">Lên ý tưởng dự án, chỉnh sửa, chủ đạo viết chính cho Document</p>
                <div class="social-links"><a href="https://www.facebook.com/kiet.uc.527593#"><i class="bi bi-facebook"></i></a></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/qson.jpg" class="member-img">
                <h5 class="member-name">Quang Sơn</h5>
                <span class="role-badge">Front-end</span>
                <p class="member-task">Thiết kế Giao diện cửa hàng, thêm chức năng cho cửa hàng và sản phẩm.</p>
                <div class="social-links"><a href="https://www.facebook.com/sad.boiz.see.tynk"><i class="bi bi-facebook"></i></a></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/thieu.jpg" class="member-img">
                <h5 class="member-name">Trung Hiếu</h5>
                <span class="role-badge">Front-end</span>
                <p class="member-task">Thiết kế UI/UX giao diện trang chủ, xử lý logic thanh toán và giỏ hàng.</p>
                <div class="social-links"><a href="https://www.facebook.com/checker.yea.9"><i class="bi bi-facebook"></i></a></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/mhieu.jpg" class="member-img">
                <h5 class="member-name">Minh Hiếu</h5>
                <span class="role-badge">Document</span>
                <p class="member-task">Thiết kế UI/UX giao diện trang chủ, trang quản trị Dark Mode.</p>
                <div class="social-links"><a href="#"><i class="bi bi-facebook"></i></a></div>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Cấu hình chung để không phải viết lại nhiều lần
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff'
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#2a2f40'
                },
                ticks: {
                    color: '#a0aec0'
                }
            },
            x: {
                grid: {
                    color: '#2a2f40'
                },
                ticks: {
                    color: '#a0aec0'
                }
            }
        }
    };

    // --- BIỂU ĐỒ 1: NĂM (Dùng Bar Chart cho đẹp) ---
    const ctxYear = document.getElementById('revenueChartYear').getContext('2d');
    new Chart(ctxYear, {
        type: 'bar',
        data: {
            // Lấy biến từ PHP controller
            labels: <?= isset($jsonLabels1Year) ? $jsonLabels1Year : '[]' ?>,
            datasets: [{
                label: 'Doanh thu Tháng (VND)',
                data: <?= isset($jsonValues1Year) ? $jsonValues1Year : '[]' ?>,
                backgroundColor: 'rgba(13, 202, 240, 0.6)', // Màu xanh dương
                borderColor: '#0dcaf0',
                borderWidth: 1
            }]
        },
        options: commonOptions
    });

    // --- BIỂU ĐỒ 2: THÁNG (Dùng Line Chart cho xu hướng) ---
    const ctxMonth = document.getElementById('revenueChartMonth').getContext('2d');
    new Chart(ctxMonth, {
        type: 'line',
        data: {
            // Lấy biến từ PHP controller
            labels: <?= isset($jsonLabels30Days) ? $jsonLabels30Days : '[]' ?>,
            datasets: [{
                label: 'Doanh thu Ngày (VND)',
                data: <?= isset($jsonValues30Days) ? $jsonValues30Days : '[]' ?>,
                backgroundColor: 'rgba(255, 46, 99, 0.2)', // Màu đỏ hồng
                borderColor: '#ff2e63',
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#ff2e63',
                pointRadius: 4,
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });
    const ctx999 = document.getElementById('revenueChart999').getContext('2d');
    new Chart(ctx999, {
        type: 'line',
        data: {
            labels: <?= isset($jsonLabels999Days) ? $jsonLabels999Days : '[]' ?>,
            datasets: [{
                label: 'Doanh thu (VND)',
                data: <?= isset($jsonValues999Days) ? $jsonValues999Days : '[]' ?>,
                backgroundColor: 'rgba(40, 167, 69, 0.2)', // Màu xanh lá
                borderColor: '#28a745',
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#28a745',
                pointRadius: 2, // Điểm nhỏ lại vì dữ liệu nhiều
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });
</script>