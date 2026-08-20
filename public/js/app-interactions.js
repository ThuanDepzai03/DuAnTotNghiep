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
});
