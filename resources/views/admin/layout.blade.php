<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<body class="theme-dark">
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                            <img src="{{ asset('img/logo.png') }}" alt="AE Phoenic" style="height: 42px; width: auto;">
                            <span class="ms-2 fw-bold">AE PHOENIC</span>
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
                    <li class="sidebar-item">
                        <a href="{{ route('home') }}" class="sidebar-link">
                            <i class="bi bi-shop"></i>
                            <span>Cửa hàng</span>
                        </a>
                    </li>
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
                    <li class="sidebar-item {{ request()->routeIs('admin.attributes.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.attributes.index') }}" class="sidebar-link">
                            <i class="bi bi-sliders"></i>
                            <span>Thuộc tính</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.brands.index') }}" class="sidebar-link">
                            <i class="bi bi-tags-fill"></i>
                            <span>Thương hiệu</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                            <i class="bi bi-phone"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}" class="sidebar-link">
                            <i class="bi bi-images"></i>
                            <span>Banner trang chủ</span>
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
                    <li class="sidebar-item {{ request()->routeIs('admin.inventory.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.inventory.imeis.index') }}" class="sidebar-link">
                            <i class="bi bi-upc-scan"></i>
                            <span>Kho và IMEI</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.returns.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.returns.index') }}" class="sidebar-link">
                            <i class="bi bi-box-arrow-in-left"></i>
                            <span>Trả hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.warranties.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.warranties.index') }}" class="sidebar-link">
                            <i class="bi bi-tools"></i>
                            <span>Bảo hành</span>
                        </a>
                    </li>
<li class="sidebar-item {{ request()->routeIs('admin.vouchers.*') ? 'active' : '' }}">
    <a href="{{ route('admin.vouchers.index') }}" class="sidebar-link">
        <i class="bi bi-tag-fill"></i>
        <span>Voucher</span>
    </a>
</li>
                    <li class="sidebar-item {{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.feedback.index') }}" class="sidebar-link">
                            <i class="bi bi-chat-left-text"></i>
                            <span>Liên hệ và đánh giá</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.statistics.revenue') ? 'active' : '' }}">
                        <a href="{{ route('admin.statistics.revenue') }}" class="sidebar-link">
                            <i class="bi bi-bar-chart-line-fill"></i>
                            <span>Thống kê doanh thu</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div id="main">
        <header class="mb-3 d-flex justify-content-between align-items-center px-3">

    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <div class="admin-header-right">

        <!-- Chuông thông báo -->
        <a href="{{ route('admin.chat') }}" class="notification-bell">
    <i class="bi bi-bell-fill"></i>
    <span class="notification-badge" id="notification-count">0</span>
</a>

        <!-- Chế độ tối -->
        <button type="button" class="theme-switch-btn" id="theme-toggle-btn" aria-label="Chuyển sang chế độ sáng">
            <span class="theme-switch-track">
                <span class="theme-switch-thumb">
                    <i class="bi bi-sun-fill icon-light" aria-hidden="true"></i>
                    <i class="bi bi-moon-stars-fill icon-dark" aria-hidden="true"></i>
                </span>
            </span>
            <span class="theme-switch-text" id="theme-label">Dark</span>
        </button>

    </div>

</header>



        <div class="page-content">
            @yield('content')
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2026 © AE Phoenic Store</p>
                </div>
                <div class="float-end">
                    <p>REPO GIT<span class="text-danger"><i class="bi bi-heart"></i></span> : <a href="https://github.com/ThuanDepzai03/DuAnTotNghiep">Thuandepzai03</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('admin-assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin-assets/js/main.js') }}"></script>
<script>
    let notificationAudioContext = null;

    function ensureNotificationAudio() {
        const AudioCtor = window.AudioContext || window.webkitAudioContext;
        if (!AudioCtor) return null;

        if (!notificationAudioContext) {
            notificationAudioContext = new AudioCtor();
        }

        if (notificationAudioContext.state === 'suspended') {
            notificationAudioContext.resume().catch(function () {});
        }

        return notificationAudioContext;
    }

    function unlockNotificationAudio() {
        ensureNotificationAudio();
    }

    document.addEventListener('pointerdown', unlockNotificationAudio, { once: true });
    document.addEventListener('keydown', unlockNotificationAudio, { once: true });

    function playNotificationTone() {
        try {
            const audioContext = ensureNotificationAudio();
            if (!audioContext) return;

            const oscillator = audioContext.createOscillator();
            const gain = audioContext.createGain();
            const now = audioContext.currentTime;

            oscillator.type = 'triangle';
            oscillator.frequency.setValueAtTime(880, now);
            oscillator.frequency.exponentialRampToValueAtTime(660, now + 0.12);

            gain.gain.setValueAtTime(0.0001, now);
            gain.gain.exponentialRampToValueAtTime(0.08, now + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.0001, now + 0.22);

            oscillator.connect(gain);
            gain.connect(audioContext.destination);
            oscillator.start(now);
            oscillator.stop(now + 0.22);
        } catch (error) {
            console.log('Không phát âm thanh thông báo:', error);
        }
    }

    function showAdminToast(title, message) {
        let container = document.getElementById('admin-toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'admin-toast-container';
            container.style.cssText = 'position:fixed;right:20px;bottom:20px;z-index:99999;display:flex;flex-direction:column;gap:10px;';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.style.cssText = 'min-width:260px;max-width:320px;padding:12px 14px;border-radius:12px;background:#111827;color:#fff;box-shadow:0 12px 30px rgba(0,0,0,.18);border-left:4px solid #3b82f6;';
        toast.innerHTML = '<div style="font-weight:700;font-size:14px;">' + title + '</div><div style="font-size:12px;color:#dbeafe;margin-top:4px;">' + message + '</div>';
        container.appendChild(toast);

        setTimeout(function () {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(10px)';
            toast.style.transition = 'all 0.25s ease';
            setTimeout(function () { toast.remove(); }, 250);
        }, 3500);

        playNotificationTone();
    }

    let adminUiAudioContext = null;

    function ensureAdminUiAudio() {
        const AudioCtor = window.AudioContext || window.webkitAudioContext;
        if (!AudioCtor) return null;

        if (!adminUiAudioContext) {
            adminUiAudioContext = new AudioCtor();
        }

        if (adminUiAudioContext.state === 'suspended') {
            adminUiAudioContext.resume().catch(function () {});
        }

        return adminUiAudioContext;
    }

    function playAdminUiTone(options = {}) {
        try {
            const audioContext = ensureAdminUiAudio();
            if (!audioContext) return;

            const oscillator = audioContext.createOscillator();
            const gain = audioContext.createGain();
            const now = audioContext.currentTime;
            const type = options.type || 'sine';
            const startFrequency = options.startFrequency || 520;
            const endFrequency = options.endFrequency || 360;
            const duration = options.duration || 0.12;

            oscillator.type = type;
            oscillator.frequency.setValueAtTime(startFrequency, now);
            oscillator.frequency.exponentialRampToValueAtTime(endFrequency, now + duration);

            gain.gain.setValueAtTime(0.0001, now);
            gain.gain.exponentialRampToValueAtTime(0.04, now + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.0001, now + duration);

            oscillator.connect(gain);
            gain.connect(audioContext.destination);
            oscillator.start(now);
            oscillator.stop(now + duration);
        } catch (error) {
            console.log('Không phát âm thanh click admin:', error);
        }
    }

    function playDangerButtonTone() {
        playAdminUiTone({
            type: 'square',
            startFrequency: 180,
            endFrequency: 110,
            duration: 0.2
        });
    }

    document.addEventListener('pointerdown', ensureAdminUiAudio, { once: true });
    document.addEventListener('keydown', ensureAdminUiAudio, { once: true });

    document.addEventListener('click', function (event) {
        const target = event.target.closest('button, .btn, a, .nav-link');
        if (!target) return;

        const redButton = target.closest('.btn-danger, .btn-outline-danger, .bg-danger, .badge.bg-danger, .delete-btn, [data-danger-action]');
        if (redButton) {
            playDangerButtonTone();
            return;
        }

        if (target.closest('button, .btn, .nav-link')) {
            playAdminUiTone({
                type: 'sine',
                startFrequency: 420,
                endFrequency: 280,
                duration: 0.1
            });
        }
    });

    function updateAdminChatUnreadCount() {
        fetch('/admin/chat/unread', {
            headers: { 'Accept': 'application/json' }
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('HTTP Status: ' + response.status);
                }

                return response.json();
            })
            .then(function (data) {
                var badge = document.getElementById('notification-count');
                var count = Number(data.count || 0);

                if (badge) {
                    badge.textContent = count;
                    badge.style.display = count ? 'inline-block' : 'none';
                }
            })
            .catch(function (error) {
                console.log('Lỗi tải số tin nhắn chưa đọc:', error);
            });
    }

    const adminNotificationState = {
        orders: 0,
        returns: 0,
        warranties: 0,
        messages: 0
    };

    let adminNotificationsInitialized = false;

    function pollAdminNotifications() {
        fetch('/admin/notification-summary', {
            headers: { 'Accept': 'application/json' }
        })
            .then(function (response) {
                if (!response.ok) throw new Error('HTTP Status: ' + response.status);
                return response.json();
            })
            .then(function (data) {
                const next = {
                    orders: Number(data.orders || 0),
                    returns: Number(data.returns || 0),
                    warranties: Number(data.warranties || 0),
                    messages: Number(data.messages || 0)
                };

                if (!adminNotificationsInitialized) {
                    adminNotificationState.orders = next.orders;
                    adminNotificationState.returns = next.returns;
                    adminNotificationState.warranties = next.warranties;
                    adminNotificationState.messages = next.messages;
                    adminNotificationsInitialized = true;
                    updateAdminChatUnreadCount();
                    return;
                }

                if (next.orders > adminNotificationState.orders) {
                    showAdminToast('Đơn hàng mới', 'Có ' + (next.orders - adminNotificationState.orders) + ' đơn hàng chờ xác nhận.');
                }
                if (next.returns > adminNotificationState.returns) {
                    showAdminToast('Yêu cầu trả hàng', 'Có ' + (next.returns - adminNotificationState.returns) + ' yêu cầu mới cần xử lý.');
                }
                if (next.warranties > adminNotificationState.warranties) {
                    showAdminToast('Bảo hành', 'Có ' + (next.warranties - adminNotificationState.warranties) + ' yêu cầu bảo hành mới.');
                }
                if (next.messages > adminNotificationState.messages) {
                    showAdminToast('Tin nhắn mới', 'Có ' + (next.messages - adminNotificationState.messages) + ' tin nhắn khách chưa đọc.');
                }

                adminNotificationState.orders = next.orders;
                adminNotificationState.returns = next.returns;
                adminNotificationState.warranties = next.warranties;
                adminNotificationState.messages = next.messages;

                updateAdminChatUnreadCount();
            })
            .catch(function (error) {
                console.log('Lỗi tải thông báo admin:', error);
            });
    }

    if ('Notification' in window && Notification.permission === 'default') {
        Notification.requestPermission().catch(function () {});
    }

    pollAdminNotifications();
    window.setInterval(pollAdminNotifications, 8000);
    window.setInterval(updateAdminChatUnreadCount, 5000);
</script>
@stack('scripts')
</body>
</html>
