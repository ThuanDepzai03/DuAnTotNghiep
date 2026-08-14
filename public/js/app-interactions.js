document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header');

    if (header) {
        const updateHeaderState = () => {
            const scrolled = window.scrollY > 16;
            header.classList.toggle('is-scrolled', scrolled);
        };

        updateHeaderState();
        window.addEventListener('scroll', updateHeaderState, { passive: true });
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
