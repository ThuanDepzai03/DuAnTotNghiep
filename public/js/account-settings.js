(() => {
    const root = document.querySelector('.account-settings-page');
    if (!root) return;

    const tabs = [...root.querySelectorAll('[data-tab]')];
    const panels = [...root.querySelectorAll('[data-panel]')];
    const activateTab = (name, updateUrl = true) => {
        const active = tabs.find((tab) => tab.dataset.tab === name) || tabs[0];
        tabs.forEach((tab) => {
            const selected = tab === active;
            tab.classList.toggle('is-active', selected);
            tab.setAttribute('aria-selected', String(selected));
            tab.tabIndex = selected ? 0 : -1;
        });
        panels.forEach((panel) => {
            const selected = panel.dataset.panel === active.dataset.tab;
            panel.classList.toggle('is-active', selected);
            panel.hidden = !selected;
        });
        if (updateUrl) {
            const url = new URL(window.location.href);
            url.searchParams.set('tab', active.dataset.tab);
            window.history.replaceState({}, '', url);
        }
    };

    tabs.forEach((tab) => tab.addEventListener('click', () => activateTab(tab.dataset.tab)));
    activateTab(new URLSearchParams(window.location.search).get('tab') || 'profile', false);

    const avatarInput = document.querySelector('#account-avatar');
    const avatarPreview = document.querySelector('[data-avatar-preview]');
    let currentAvatarUrl;
    avatarInput?.addEventListener('change', () => {
        const file = avatarInput.files?.[0];
        if (!file || !avatarPreview) return;
        if (currentAvatarUrl) URL.revokeObjectURL(currentAvatarUrl);
        currentAvatarUrl = URL.createObjectURL(file);
        avatarPreview.replaceChildren(Object.assign(document.createElement('img'), {
            src: currentAvatarUrl,
            alt: 'Ảnh đại diện xem trước',
        }));
    });

    const dialog = document.querySelector('[data-address-dialog]');
    const addressForm = dialog?.querySelector('[data-address-form]');
    const methodOverride = dialog?.querySelector('[data-address-method]');
    const addressIdInput = dialog?.querySelector('[data-address-id]');
    const dialogTitle = dialog?.querySelector('#address-dialog-title');
    const addressFields = ['recipient_name', 'phone', 'label', 'city', 'ward', 'address_detail'];
    const resetAddressForm = () => {
        addressForm?.reset();
        addressForm.action = addressForm.dataset.storeUrl || addressForm.action;
        methodOverride.disabled = true;
        methodOverride.value = '';
        addressIdInput.value = '';
        dialogTitle.textContent = 'Thêm địa chỉ mới';
    };

    if (addressForm) addressForm.dataset.storeUrl = addressForm.action;
    document.querySelectorAll('[data-open-address]').forEach((button) => button.addEventListener('click', () => {
        resetAddressForm();
        dialog.showModal();
    }));
    document.querySelectorAll('[data-edit-address]').forEach((button) => button.addEventListener('click', () => {
        resetAddressForm();
        addressForm.action = `${addressForm.dataset.storeUrl}/${encodeURIComponent(button.dataset.id)}`;
        methodOverride.disabled = false;
        methodOverride.value = 'PUT';
        addressIdInput.value = button.dataset.id;
        dialogTitle.textContent = 'Chỉnh sửa địa chỉ';
        addressFields.forEach((field) => {
            addressForm.elements.namedItem(field).value = button.dataset[field === 'recipient_name' ? 'name' : field === 'address_detail' ? 'detail' : field];
        });
        addressForm.elements.namedItem('is_default').checked = button.dataset.default === '1';
        dialog.showModal();
    }));
    document.querySelectorAll('[data-close-address]').forEach((button) => button.addEventListener('click', () => dialog?.close()));
    dialog?.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });
    if (dialog?.dataset.openOnError === '1') {
        const failedAddressId = addressIdInput.value;
        if (failedAddressId) {
            addressForm.action = `${addressForm.dataset.storeUrl}/${encodeURIComponent(failedAddressId)}`;
            methodOverride.disabled = false;
            methodOverride.value = 'PUT';
            dialogTitle.textContent = 'Chỉnh sửa địa chỉ';
        }
        dialog.showModal();
    }
    document.querySelectorAll('[data-confirm-delete]').forEach((form) => form.addEventListener('submit', (event) => {
        if (!window.confirm('Bạn có chắc muốn xóa địa chỉ này?')) event.preventDefault();
    }));
    document.querySelector('[data-confirm-sessions]')?.addEventListener('submit', (event) => {
        if (!window.confirm('Đăng xuất tài khoản khỏi tất cả thiết bị khác?')) event.preventDefault();
    });

    const passwordInput = document.querySelector('[data-password-input]');
    const strengthBar = document.querySelector('[data-strength-bar]');
    const strengthLabel = document.querySelector('[data-strength-label]');
    passwordInput?.addEventListener('input', () => {
        const password = passwordInput.value;
        const checks = [
            password.length >= 8,
            /[a-z]/.test(password) && /[A-Z]/.test(password),
            /\d/.test(password),
            /[^A-Za-z0-9]/.test(password),
        ];
        const score = password ? checks.filter(Boolean).length : 0;
        const labels = ['Độ mạnh mật khẩu', 'Yếu', 'Trung bình', 'Khá tốt', 'Mạnh'];
        const colors = ['#454752', '#e5484d', '#f5a524', '#64bb74', '#23b26d'];
        strengthBar.style.width = `${score * 25}%`;
        strengthBar.style.background = colors[score];
        strengthLabel.textContent = labels[score];
    });

    root.querySelector('[data-theme-toggle]')?.addEventListener('change', (event) => {
        root.dataset.theme = event.currentTarget.checked ? 'dark' : 'light';
        document.body.dataset.accountTheme = root.dataset.theme;
    });

    const soundToggle = root.querySelector('[data-sound-toggle]');
    let audioContext;
    root.addEventListener('click', (event) => {
        if (!soundToggle?.checked || !event.target.closest('button, a, [role="button"]')) return;
        try {
            audioContext ||= new AudioContext();
            const oscillator = audioContext.createOscillator();
            const gain = audioContext.createGain();
            oscillator.type = 'sine';
            oscillator.frequency.value = 660;
            gain.gain.setValueAtTime(.035, audioContext.currentTime);
            gain.gain.exponentialRampToValueAtTime(.001, audioContext.currentTime + .055);
            oscillator.connect(gain);
            gain.connect(audioContext.destination);
            oscillator.start();
            oscillator.stop(audioContext.currentTime + .055);
        } catch (error) {
            console.warn('Không thể phát âm thanh tương tác.', error);
        }
    });

    document.querySelectorAll('[data-dismiss-toast]').forEach((button) => button.addEventListener('click', () => button.closest('[data-toast]')?.remove()));
    window.setTimeout(() => document.querySelectorAll('[data-toast]').forEach((toast) => toast.remove()), 6000);
})();
