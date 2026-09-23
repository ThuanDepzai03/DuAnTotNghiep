document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header');
    const siteHeader = document.querySelector('.site-header');
    let lastScrollY = 0;
    let ticking = false;

    if (header || siteHeader) {
        const target = siteHeader || header;
        
        const updateHeaderState = () => {
            const scrolled = window.scrollY > 16;
            const isScrollingDown = window.scrollY > lastScrollY + 5;
            const isScrollingUp = window.scrollY < lastScrollY - 5;
            
            // Thêm class blur/shadow khi scroll
            target.classList.toggle('is-scrolled', scrolled);
            
            // Smart header: ẩn khi cuộn xuống, hiện khi cuộn lên
            if (scrolled) {
                if (isScrollingDown) {
                    target.classList.add('header-hidden');
                } else if (isScrollingUp) {
                    target.classList.remove('header-hidden');
                }
            } else {
                target.classList.remove('header-hidden');
            }
            
            lastScrollY = window.scrollY;
            ticking = false;
        };
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(updateHeaderState);
                ticking = true;
            }
        }, { passive: true });
        
        updateHeaderState();
    }

    document.body.classList.add('is-ready');

    const revealItems = document.querySelectorAll('.reveal, .product, .product-card, .widget, .card, .section-title');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const cartForms = document.querySelectorAll('form[action*="/cart/add"]');
    const cartLink = document.querySelector('.header-cart-action');
    const cartIcon = cartLink?.querySelector('.fa-shopping-cart');
    const cartCount = cartLink?.querySelector('.cart-count');

    function showCartToast(message, isError = false) {
        const toast = document.createElement('div');
        toast.className = `cart-toast${isError ? ' cart-toast--error' : ''}`;
        toast.textContent = message;
        document.body.appendChild(toast);
        requestAnimationFrame(() => toast.classList.add('is-visible'));
        window.setTimeout(() => {
            toast.classList.remove('is-visible');
            window.setTimeout(() => toast.remove(), 220);
        }, 2400);
    }

    function updateCartBadge(totalQuantity) {
        if (!cartCount) return;
        cartCount.textContent = totalQuantity;
        cartCount.classList.toggle('is-empty', Number(totalQuantity) < 1);
        cartLink?.setAttribute('aria-label', `Giỏ hàng, ${totalQuantity} sản phẩm`);
    }

    function animateItemToCart(form) {
        if (!cartIcon) return;

        const sourceImage = form.closest('.product-card-custom, .product-card, article')?.querySelector('img')
            || document.querySelector('#main-product-image');
        const sourceRect = (sourceImage || form.querySelector('button'))?.getBoundingClientRect();
        const targetRect = cartIcon.getBoundingClientRect();

        if (!sourceRect) return;

        const flyer = document.createElement('span');
        flyer.className = 'cart-fly-item';
        flyer.style.left = `${sourceRect.left + sourceRect.width / 2 - 22}px`;
        flyer.style.top = `${sourceRect.top + sourceRect.height / 2 - 22}px`;
        if (sourceImage?.src) {
            flyer.style.backgroundImage = `url("${sourceImage.src}")`;
        } else {
            flyer.innerHTML = '<i class="fa fa-shopping-cart"></i>';
        }
        flyer.style.setProperty('--cart-x', `${targetRect.left + targetRect.width / 2 - sourceRect.left - sourceRect.width / 2}px`);
        flyer.style.setProperty('--cart-y', `${targetRect.top + targetRect.height / 2 - sourceRect.top - sourceRect.height / 2}px`);
        document.body.appendChild(flyer);
        requestAnimationFrame(() => flyer.classList.add('is-flying'));
        window.setTimeout(() => flyer.remove(), 650);
        cartLink.classList.remove('is-cart-bumping');
        void cartLink.offsetWidth;
        cartLink.classList.add('is-cart-bumping');
    }

    cartForms.forEach(form => {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const button = form.querySelector('button[type="submit"]');
            const originalText = button?.innerHTML;
            if (button) {
                button.disabled = true;
                button.classList.add('is-loading');
            }

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
                const data = await response.json();

                if (!response.ok || !data.success) {
                    throw new Error(data.message || 'Không thể thêm sản phẩm vào giỏ hàng.');
                }

                updateCartBadge(data.totalQuantity);
                animateItemToCart(form);
                showCartToast(data.message);
            } catch (error) {
                showCartToast(error.message, true);
            } finally {
                if (button) {
                    button.disabled = false;
                    button.classList.remove('is-loading');
                    button.innerHTML = originalText;
                }
            }
        });
    });
});
