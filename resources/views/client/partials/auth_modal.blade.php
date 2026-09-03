<div id="auth-modal" class="auth-modal" aria-hidden="true">
    <div class="auth-modal__backdrop" data-close-auth-modal="true"></div>
    <div class="auth-modal__card" role="dialog" aria-modal="true" aria-labelledby="auth-modal-title">
        <button type="button" class="auth-modal__close" aria-label="Đóng" data-close-auth-modal="true">&times;</button>

        <div class="auth-modal__tabs" role="tablist" aria-label="Đăng nhập và đăng ký">
            <button type="button" class="auth-modal__tab is-active" data-auth-tab="login" role="tab" aria-selected="true">Đăng nhập</button>
            <button type="button" class="auth-modal__tab" data-auth-tab="register" role="tab" aria-selected="false">Đăng ký</button>
        </div>

        <div id="auth-modal-title" class="auth-modal__title">Chào mừng bạn quay lại</div>

        <div class="auth-modal__panel is-active" data-auth-panel="login">
            <form id="client-login-form" class="auth-form" novalidate>
                @csrf
                <div class="auth-form__group">
                    <label for="login-user">Số điện thoại / Email</label>
                    <input id="login-user" type="text" name="user" placeholder="Nhập số điện thoại hoặc email" required>
                    <small class="auth-form__error" data-error-for="user"></small>
                </div>

                <div class="auth-form__group">
                    <label for="login-pass">Mật khẩu</label>
                    <input id="login-pass" type="password" name="pass" placeholder="Nhập mật khẩu" required>
                    <small class="auth-form__error" data-error-for="pass"></small>
                </div>

                <div class="auth-form__row">
                    <label class="auth-form__remember">
                        <input type="checkbox" name="remember" value="1">
                        Ghi nhớ tôi
                    </label>
                    <a href="{{ route('password.request') }}" class="auth-form__link">Quên mật khẩu?</a>
                </div>

                <div id="login-message" class="auth-form__message" aria-live="polite"></div>
                <button type="submit" class="auth-form__submit">Đăng nhập</button>
            </form>
        </div>

        <div class="auth-modal__panel" data-auth-panel="register">
            <form id="client-register-form" class="auth-form" novalidate>
                @csrf
                <div class="auth-form__group">
                    <label for="register-name">Họ và tên</label>
                    <input id="register-name" type="text" name="name" placeholder="Họ và tên của bạn" required>
                    <small class="auth-form__error" data-error-for="name"></small>
                </div>
                <div class="auth-form__group">
                    <label for="register-user">Tên đăng nhập</label>
                    <input id="register-user" type="text" name="user" placeholder="Tên đăng nhập" required>
                    <small class="auth-form__error" data-error-for="user"></small>
                </div>

                <div class="auth-form__group">
                    <label for="register-email">Email</label>
                    <input id="register-email" type="email" name="email" placeholder="Email của bạn" required>
                    <small class="auth-form__error" data-error-for="email"></small>
                </div>

                <div class="auth-form__group">
                    <label for="register-pass">Mật khẩu</label>
                    <input id="register-pass" type="password" name="pass" placeholder="Mật khẩu tối thiểu 6 ký tự" required>
                    <small class="auth-form__error" data-error-for="pass"></small>
                </div>

                <div class="auth-form__group">
                    <label for="register-tel">Số điện thoại</label>
                    <input id="register-tel" type="tel" name="tel" placeholder="Số điện thoại" required>
                    <small class="auth-form__error" data-error-for="tel"></small>
                </div>

                <div id="register-message" class="auth-form__message" aria-live="polite"></div>
                <button type="submit" class="auth-form__submit">Tạo tài khoản</button>
            </form>
        </div>
    </div>
</div>

<style>
    .auth-modal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 2000;
    }

    .auth-modal.is-open {
        display: flex;
    }

    .auth-modal__backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .auth-modal__card {
        position: relative;
        width: min(100%, 480px);
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.25);
        padding: 28px 24px 24px;
        z-index: 1;
    }

    .auth-modal__close {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #111827;
        font-size: 22px;
        line-height: 1;
        cursor: pointer;
    }

    .auth-modal__tabs {
        display: flex;
        background: #f3f4f6;
        border-radius: 12px;
        padding: 6px;
        margin-bottom: 22px;
    }

    .auth-modal__tab {
        flex: 1;
        border: 0;
        background: transparent;
        border-radius: 10px;
        padding: 12px 14px;
        font-weight: 700;
        cursor: pointer;
        color: #374151;
        transition: all 0.2s ease;
    }

    .auth-modal__tab.is-active {
        background: #fff;
        color: #111827;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .auth-modal__title {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 20px;
        color: #111827;
    }

    .auth-modal__panel {
        display: none;
    }

    .auth-modal__panel.is-active {
        display: block;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .auth-form__group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .auth-form__group label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .auth-form__group input {
        width: 100%;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .auth-form__group input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .auth-form__row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        font-size: 13px;
        color: #4b5563;
    }

    .auth-form__remember {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .auth-form__link {
        color: #2563eb;
        text-decoration: none;
    }

    .auth-form__message {
        min-height: 20px;
        font-size: 13px;
        line-height: 1.5;
        display: none;
    }

    .auth-form__message.is-error {
        color: #dc2626;
        display: block;
    }

    .auth-form__message.is-success {
        color: #15803d;
        display: block;
    }

    .auth-form__error {
        min-height: 16px;
        font-size: 12px;
        color: #dc2626;
    }

    .auth-form__submit {
        border: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        padding: 12px 16px;
        font-weight: 700;
        cursor: pointer;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }

    .auth-form__submit:hover {
        transform: translateY(-1px);
        opacity: 0.98;
    }
</style>

<script>
    (function () {
        const modal = document.getElementById('auth-modal');
        const openBtn = document.getElementById('btn-open-auth-modal');
        const tabs = document.querySelectorAll('.auth-modal__tab');
        const panels = document.querySelectorAll('.auth-modal__panel');
        const closeButtons = document.querySelectorAll('[data-close-auth-modal="true"]');

        function setTab(tabName) {
            tabs.forEach((tab) => {
                const active = tab.dataset.authTab === tabName;
                tab.classList.toggle('is-active', active);
                tab.setAttribute('aria-selected', active ? 'true' : 'false');
            });

            panels.forEach((panel) => {
                const active = panel.dataset.authPanel === tabName;
                panel.classList.toggle('is-active', active);
            });

            const title = document.querySelector('.auth-modal__title');
            title.textContent = tabName === 'login' ? 'Chào mừng bạn quay lại' : 'Tạo tài khoản mới';
        }

        function openModal() {
            if (!modal) return;
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        if (openBtn) {
            openBtn.addEventListener('click', function (event) {
                event.preventDefault();
                openModal();
            });
        }

        closeButtons.forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        modal && modal.addEventListener('click', function (event) {
            if (event.target === modal || event.target.classList.contains('auth-modal__backdrop')) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal && modal.classList.contains('is-open')) {
                closeModal();
            }
        });

        tabs.forEach((tab) => {
            tab.addEventListener('click', function () {
                setTab(this.dataset.authTab);
            });
        });

        const requestedTab = new URLSearchParams(window.location.search).get('auth');
        if (requestedTab === 'login' || requestedTab === 'register') {
            setTab(requestedTab);
            openModal();
        }

        function showMessage(elementId, message, type) {
            const messageBox = document.getElementById(elementId);
            if (!messageBox) return;
            messageBox.textContent = message;
            messageBox.classList.remove('is-error', 'is-success');
            messageBox.classList.add(type === 'error' ? 'is-error' : 'is-success');
        }

        function clearErrors(formId) {
            const form = document.getElementById(formId);
            if (!form) return;
            form.querySelectorAll('.auth-form__error').forEach((node) => {
                node.textContent = '';
            });
        }

        function handleFormSubmit(formId, url, successRedirect) {
            const form = document.getElementById(formId);
            if (!form) return;

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const formData = new FormData(form);
                clearErrors(formId);
                showMessage(formId === 'client-login-form' ? 'login-message' : 'register-message', '', 'success');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(async (response) => {
                    const data = await response.json().catch(() => ({}));
                    if (!response.ok) {
                        const errors = data.errors || {};
                        const firstError = data.message || 'Có lỗi xảy ra.';
                        Object.keys(errors).forEach((key) => {
                            const errorNode = form.querySelector('[data-error-for="' + key + '"]');
                            if (errorNode) {
                                errorNode.textContent = Array.isArray(errors[key]) ? errors[key][0] : errors[key];
                            }
                        });
                        showMessage(formId === 'client-login-form' ? 'login-message' : 'register-message', firstError, 'error');
                        return;
                    }

                    showMessage(formId === 'client-login-form' ? 'login-message' : 'register-message', data.message || 'Thành công.', 'success');
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else if (successRedirect) {
                        window.location.href = successRedirect;
                    }
                })
                .catch(() => {
                    showMessage(formId === 'client-login-form' ? 'login-message' : 'register-message', 'Có lỗi xảy ra khi gửi yêu cầu.', 'error');
                });
            });
        }

        handleFormSubmit('client-login-form', '{{ route('login.post') }}', '{{ route('home') }}');
        handleFormSubmit('client-register-form', '{{ route('register.post') }}', '{{ route('account.profile') }}');
    })();
</script>
