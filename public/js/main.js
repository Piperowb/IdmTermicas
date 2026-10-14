'use strict';

document.addEventListener('DOMContentLoaded', () => {

    // ═══════════════════════════════════════════════
    // 1. Inicializar AOS
    // ═══════════════════════════════════════════════
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 900,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
            delay: 0,
        });
    }

    // ═══════════════════════════════════════════════
    // 2. Navbar scroll
    // ═══════════════════════════════════════════════
    const nav = document.getElementById('mainNav');
    if (nav) {
        const toggleNav = () => nav.classList.toggle('scrolled', window.scrollY > 80);
        window.addEventListener('scroll', toggleNav, { passive: true });
        toggleNav();
    }

    // ═══════════════════════════════════════════════
    // 3. Scroll Top button
    // ═══════════════════════════════════════════════
    const scrollTopBtn = document.getElementById('scrollTop');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            scrollTopBtn.classList.toggle('visible', window.scrollY > 500);
        }, { passive: true });
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ═══════════════════════════════════════════════
    // 4. Contadores animados (count-up con easing)
    // ═══════════════════════════════════════════════
    const counters = document.querySelectorAll('.idm-stat-number');
    if (counters.length) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const text = el.textContent.trim();
                const match = text.match(/(\d+)/);
                if (!match) return;

                const end = parseInt(match[1]);
                const suffix = text.replace(match[1], '');
                const duration = 2200;
                const startTime = performance.now();

                const animate = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 4);
                    el.textContent = Math.floor(end * eased) + suffix;
                    if (progress < 1) requestAnimationFrame(animate);
                    else el.textContent = end + suffix;
                };
                requestAnimationFrame(animate);
                counterObserver.unobserve(el);
            });
        }, { threshold: 0.4 });

        counters.forEach(c => counterObserver.observe(c));
    }

    // ═══════════════════════════════════════════════
    // 5. Parallax suave en Page Hero
    // ═══════════════════════════════════════════════
    const pageHeroes = document.querySelectorAll('.idm-page-hero');
    if (pageHeroes.length && window.innerWidth > 991) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            pageHeroes.forEach(hero => {
                const rect = hero.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    const speed = 0.3;
                    hero.style.backgroundPositionY = `${scrolled * speed}px`;
                }
            });
        }, { passive: true });
    }

    // ═══════════════════════════════════════════════
    // 6. Smooth scroll para links internos
    // ═══════════════════════════════════════════════
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href === '#' || href.length < 2) return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                window.scrollTo({ top: target.offsetTop - 100, behavior: 'smooth' });
            }
        });
    });

    // ═══════════════════════════════════════════════
    // 7. Tilt 3D en cards (efecto mouse move)
    // ═══════════════════════════════════════════════
    if (window.innerWidth > 991) {
        document.querySelectorAll('.idm-tilt').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width;
                const y = (e.clientY - rect.top) / rect.height;
                const rotateX = (y - 0.5) * -10;
                const rotateY = (x - 0.5) * 10;
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    // ═══════════════════════════════════════════════
    // 8. Reveal personalizado con IntersectionObserver
    // ═══════════════════════════════════════════════
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

        reveals.forEach(el => revealObserver.observe(el));
    }

    // ═══════════════════════════════════════════════
    // Hero carousel + sincronización de indicadores
    // ═══════════════════════════════════════════════
    const heroCarouselEl = document.getElementById('heroCarousel');
    if (heroCarouselEl && typeof bootstrap !== 'undefined') {

        // Inicializar el carousel
        const heroCarousel = new bootstrap.Carousel(heroCarouselEl, {
            interval: 5500,
            ride: 'carousel',
            pause: false,
            wrap: true,
        });

        // Referencias a los elementos del DOM
        const dots    = heroCarouselEl.querySelectorAll('.idm-hero-dot');
        const counter = heroCarouselEl.querySelector('.idm-hero-counter .current');

        // Función que actualiza dots + contador
        function updateHeroUI(index) {
            // Actualizar dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            // Actualizar contador
            if (counter) {
                counter.textContent = '0' + (index + 1);
            }
        }

        // Escuchar el evento de cambio de slide
        heroCarouselEl.addEventListener('slide.bs.carousel', (e) => {
            updateHeroUI(e.to);
        });

        // También escuchar cuando ya terminó la transición (por seguridad)
        heroCarouselEl.addEventListener('slid.bs.carousel', (e) => {
            updateHeroUI(e.to);
        });

        // Asegurar el estado inicial
        updateHeroUI(0);

        // Click manual en los dots (Bootstrap lo maneja, pero reforzamos)
        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                heroCarousel.to(i);
            });
        });
    }

    // ═══════════════════════════════════════════════
    // 10. Fade in body al cargar
    // ═══════════════════════════════════════════════
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity .4s ease';
    requestAnimationFrame(() => {
        document.body.style.opacity = '1';
    });

    // Ajuste de altura de cards según viewport
    function adjustCardsHeight() {
        const cards = document.querySelectorAll('.idm-card');
        if (!cards.length) return;
        
        const isMobile = window.innerWidth < 768;
        cards.forEach(card => {
            if (isMobile) {
                card.style.height = 'auto';
                card.style.minHeight = '380px';
            } else if (window.innerWidth < 992) {
                card.style.height = '400px';
            } else {
                card.style.height = '440px';
            }
        });
    }
    adjustCardsHeight();
    window.addEventListener('resize', adjustCardsHeight);

});

