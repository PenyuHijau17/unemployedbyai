/**
 * ============================================================
 * ADMIN DASHBOARD JAVASCRIPT
 * ============================================================
 * Features:
 * - Sidebar collapse
 * - Mobile sidebar
 * - Profile dropdown
 * - Ripple effect
 * - Toast notification
 * - Back to top
 * - Statistic counter animation
 * - Card micro interaction
 * - Page transition
 * - Form loading state
 * - Delete confirmation
 * - Active navigation
 * - Responsive handling
 * ============================================================
 */

document.addEventListener('DOMContentLoaded', () => {

    console.log('Admin JS aktif');

    /* =========================================================
       CORE
    ========================================================= */

    const body = document.body;
    const wrapper = document.querySelector('.wrapper');
    const sidebar = document.querySelector('.sidebar');


    /* =========================================================
       SIDEBAR COLLAPSE
    ========================================================= */

    const sidebarToggle = document.querySelector(
        '#sidebarToggle, .sidebar-toggle, [data-sidebar-toggle]'
    );

    if (sidebarToggle && sidebar) {

        sidebarToggle.addEventListener('click', (event) => {

            event.preventDefault();

            body.classList.toggle('sidebar-collapsed');
            sidebar.classList.toggle('collapsed');

            if (wrapper) {
                wrapper.classList.toggle('sidebar-collapsed');
            }

            localStorage.setItem(
                'adminSidebarCollapsed',
                body.classList.contains('sidebar-collapsed')
            );

        });


        const savedState = localStorage.getItem(
            'adminSidebarCollapsed'
        );

        if (savedState === 'true') {

            body.classList.add('sidebar-collapsed');
            sidebar.classList.add('collapsed');

            if (wrapper) {
                wrapper.classList.add('sidebar-collapsed');
            }

        }

    }


    /* =========================================================
       MOBILE SIDEBAR
    ========================================================= */

    let mobileOverlay = document.querySelector(
        '.sidebar-overlay'
    );

    if (!mobileOverlay) {

        mobileOverlay = document.createElement('div');
        mobileOverlay.className = 'sidebar-overlay';

        document.body.appendChild(mobileOverlay);

    }


    const mobileSidebarToggle = document.querySelector(
        '#mobileSidebarToggle, .mobile-sidebar-toggle, [data-mobile-sidebar]'
    );


    const openMobileSidebar = () => {

        if (!sidebar) return;

        sidebar.classList.add('mobile-open');
        mobileOverlay.classList.add('active');
        body.classList.add('sidebar-mobile-open');

    };


    const closeMobileSidebar = () => {

        if (!sidebar) return;

        sidebar.classList.remove('mobile-open');
        mobileOverlay.classList.remove('active');
        body.classList.remove('sidebar-mobile-open');

    };


    if (mobileSidebarToggle) {

        mobileSidebarToggle.addEventListener(
            'click',
            (event) => {

                event.preventDefault();

                if (
                    sidebar &&
                    sidebar.classList.contains('mobile-open')
                ) {

                    closeMobileSidebar();

                } else {

                    openMobileSidebar();

                }

            }
        );

    }


    mobileOverlay.addEventListener(
        'click',
        closeMobileSidebar
    );


    /* =========================================================
       CLOSE MOBILE SIDEBAR WHEN CLICKING MENU
    ========================================================= */

    if (sidebar) {

        const sidebarLinks = sidebar.querySelectorAll('a');

        sidebarLinks.forEach((link) => {

            link.addEventListener('click', () => {

                if (window.innerWidth <= 991) {
                    closeMobileSidebar();
                }

            });

        });

    }


    /* =========================================================
       ESCAPE KEY
    ========================================================= */

    document.addEventListener('keydown', (event) => {

        if (event.key === 'Escape') {

            closeMobileSidebar();

            document
                .querySelectorAll('.dropdown-menu.show')
                .forEach((menu) => {
                    menu.classList.remove('show');
                });

            closeProfileDropdown();

        }

    });


    /* =========================================================
       RIPPLE EFFECT
    ========================================================= */

    document.addEventListener('click', (event) => {

        const button = event.target.closest(
            'button, .btn, .action-btn, .nav-link'
        );

        if (!button) return;

        if (
            button.classList.contains('no-ripple') ||
            button.closest('.dropdown-menu')
        ) {
            return;
        }


        const ripple = document.createElement('span');

        ripple.className = 'ripple';


        const rect = button.getBoundingClientRect();

        const size = Math.max(
            rect.width,
            rect.height
        );


        const x =
            event.clientX -
            rect.left -
            size / 2;

        const y =
            event.clientY -
            rect.top -
            size / 2;


        ripple.style.width = `${size}px`;
        ripple.style.height = `${size}px`;
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;


        button.classList.add('ripple-container');

        button.appendChild(ripple);


        setTimeout(() => {
            ripple.remove();
        }, 600);

    });


    /* =========================================================
       TOAST SYSTEM
    ========================================================= */

    window.adminToast = function (
        message,
        type = 'success',
        duration = 3500
    ) {

        const container = document.getElementById(
            'admin-toast-container'
        );

        if (!container) return;


        const toast = document.createElement('div');

        toast.className =
            `admin-toast admin-toast-${type}`;


        let icon = 'bi-check-circle-fill';

        if (type === 'error') {
            icon = 'bi-x-circle-fill';
        }

        if (type === 'warning') {
            icon = 'bi-exclamation-triangle-fill';
        }

        if (type === 'info') {
            icon = 'bi-info-circle-fill';
        }


        toast.innerHTML = `
            <div class="admin-toast-icon">
                <i class="bi ${icon}"></i>
            </div>

            <div class="admin-toast-message">
                ${message}
            </div>

            <button
                type="button"
                class="admin-toast-close"
                aria-label="Tutup"
            >
                <i class="bi bi-x-lg"></i>
            </button>
        `;


        container.appendChild(toast);


        requestAnimationFrame(() => {
            toast.classList.add('show');
        });


        const removeToast = () => {

            toast.classList.remove('show');

            setTimeout(() => {
                toast.remove();
            }, 300);

        };


        const closeButton = toast.querySelector(
            '.admin-toast-close'
        );

        if (closeButton) {
            closeButton.addEventListener(
                'click',
                removeToast
            );
        }


        setTimeout(
            removeToast,
            duration
        );

    };


    /* =========================================================
       LARAVEL SESSION TOAST
    ========================================================= */

    const flashMessages = document.querySelectorAll(
        '[data-toast]'
    );


    flashMessages.forEach((element) => {

        const message = element.dataset.toast;

        const type =
            element.dataset.toastType ||
            'success';


        if (message) {

            window.adminToast(
                message,
                type
            );

        }


        element.remove();

    });


    /* =========================================================
       BACK TO TOP
    ========================================================= */

    const backToTop = document.getElementById(
        'backToTop'
    );


    if (backToTop) {

        window.addEventListener(
            'scroll',
            () => {

                if (window.scrollY > 400) {

                    backToTop.classList.add('show');

                } else {

                    backToTop.classList.remove('show');

                }

            },
            {
                passive: true
            }
        );


        backToTop.addEventListener(
            'click',
            () => {

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

            }
        );

    }


    /* =========================================================
       STATISTIC COUNTER
    ========================================================= */

    const counters = document.querySelectorAll(
        '[data-counter]'
    );


    const animateCounter = (element) => {

        const target = parseFloat(
            element.dataset.counter
        );


        if (isNaN(target)) return;


        const duration = 1200;

        const startTime = performance.now();


        const update = (currentTime) => {

            const progress = Math.min(
                (currentTime - startTime) / duration,
                1
            );


            const eased =
                1 - Math.pow(
                    1 - progress,
                    3
                );


            const current =
                target * eased;


            element.textContent =
                Number.isInteger(target)
                    ? Math.floor(current)
                        .toLocaleString('id-ID')
                    : current.toFixed(1);


            if (progress < 1) {

                requestAnimationFrame(update);

            }

        };


        requestAnimationFrame(update);

    };


    if (
        counters.length &&
        'IntersectionObserver' in window
    ) {

        const counterObserver =
            new IntersectionObserver(
                (entries) => {

                    entries.forEach((entry) => {

                        if (
                            entry.isIntersecting &&
                            !entry.target.dataset.animated
                        ) {

                            entry.target.dataset.animated =
                                'true';


                            animateCounter(
                                entry.target
                            );


                            counterObserver.unobserve(
                                entry.target
                            );

                        }

                    });

                },
                {
                    threshold: 0.5
                }
            );


        counters.forEach((counter) => {

            counterObserver.observe(counter);

        });

    } else {

        counters.forEach(animateCounter);

    }


    /* =========================================================
       CARD MICRO INTERACTION
    ========================================================= */

    const cards = document.querySelectorAll(
        '.stat-card, .dashboard-card, .card-interactive, [data-card-hover]'
    );


    cards.forEach((card) => {

        card.addEventListener(
            'mouseenter',
            () => {
                card.classList.add('is-hovered');
            }
        );


        card.addEventListener(
            'mouseleave',
            () => {
                card.classList.remove('is-hovered');
            }
        );

    });


    /* =========================================================
       PAGE TRANSITION
    ========================================================= */

    body.classList.add('page-ready');


    const internalLinks = document.querySelectorAll(
        'a[href]'
    );


    internalLinks.forEach((link) => {

        const href = link.getAttribute('href');

        if (!href) return;


        if (
            href.startsWith('#') ||
            href.startsWith('javascript:') ||
            link.target === '_blank' ||
            link.hasAttribute('download') ||
            link.closest('.dropdown-menu')
        ) {
            return;
        }


        try {

            const url = new URL(
                href,
                window.location.origin
            );


            if (
                url.origin !==
                window.location.origin
            ) {
                return;
            }


            link.addEventListener(
                'click',
                (event) => {

                    if (
                        event.ctrlKey ||
                        event.shiftKey ||
                        event.metaKey ||
                        event.altKey
                    ) {
                        return;
                    }


                    event.preventDefault();


                    body.classList.add(
                        'page-leaving'
                    );


                    setTimeout(() => {

                        window.location.href =
                            url.href;

                    }, 180);

                }
            );


        } catch (error) {

            // Abaikan URL yang tidak valid.

        }

    });


    /* =========================================================
       FORM LOADING STATE
    ========================================================= */

    const forms = document.querySelectorAll(
        'form[data-loading], .admin-form'
    );


    forms.forEach((form) => {

        form.addEventListener(
            'submit',
            () => {

                const submitButton =
                    form.querySelector(
                        'button[type="submit"], input[type="submit"]'
                    );


                if (!submitButton) return;


                if (
                    submitButton.dataset.originalText
                ) {
                    return;
                }


                submitButton.dataset.originalText =
                    submitButton.innerHTML;


                submitButton.disabled = true;


                submitButton.innerHTML = `
                    <span
                        class="spinner-border spinner-border-sm me-2"
                        role="status"
                        aria-hidden="true">
                    </span>
                    Memproses...
                `;

            }
        );

    });


    /* =========================================================
       DELETE CONFIRMATION
    ========================================================= */

    const deleteButtons = document.querySelectorAll(
        '[data-confirm-delete]'
    );


    deleteButtons.forEach((button) => {

        button.addEventListener(
            'click',
            (event) => {

                const message =
                    button.dataset.confirmDelete ||
                    'Yakin ingin menghapus data ini?';


                if (!confirm(message)) {
                    event.preventDefault();
                }

            }
        );

    });


    /* =========================================================
       ACTIVE NAVIGATION
    ========================================================= */

    const currentPath =
        window.location.pathname;


    const navLinks = document.querySelectorAll(
        '.sidebar a[href]'
    );


    navLinks.forEach((link) => {

        try {

            const linkUrl = new URL(
                link.href,
                window.location.origin
            );


            const linkPath =
                linkUrl.pathname;


            if (
                linkPath !== '/' &&
                currentPath.startsWith(linkPath)
            ) {

                link.classList.add('active');

            }

        } catch (error) {

            // Abaikan URL tidak valid.

        }

    });


    /* =========================================================
       WINDOW RESIZE
    ========================================================= */

    let resizeTimer;


    window.addEventListener(
        'resize',
        () => {

            clearTimeout(resizeTimer);


            resizeTimer = setTimeout(() => {

                if (window.innerWidth > 991) {
                    closeMobileSidebar();
                }

            }, 150);

        }
    );


    /* =========================================================
       LOADING COMPLETE
    ========================================================= */

    window.addEventListener(
        'load',
        () => {

            body.classList.add(
                'admin-loaded'
            );

        }
    );


    /* =========================================================
       PROFILE DROPDOWN
    ========================================================= */

    const profileButton =
        document.getElementById(
            'profileButton'
        );


    const profileDropdown =
        document.getElementById(
            'profileDropdown'
        );


    const closeProfileDropdown = () => {

        if (profileDropdown) {

            profileDropdown.classList.remove(
                'show'
            );

        }


        if (profileButton) {

            profileButton.classList.remove(
                'active'
            );

        }

    };


    if (
        profileButton &&
        profileDropdown
    ) {

        profileButton.addEventListener(
            'click',
            (event) => {

                event.stopPropagation();


                const isOpen =
                    profileDropdown.classList.contains(
                        'show'
                    );


                closeProfileDropdown();


                if (!isOpen) {

                    profileDropdown.classList.add(
                        'show'
                    );


                    profileButton.classList.add(
                        'active'
                    );

                }

            }
        );

    }


    /* =========================================================
       CLOSE PROFILE DROPDOWN
    ========================================================= */

    document.addEventListener(
        'click',
        (event) => {

            if (
                !event.target.closest(
                    '.navbar-user-wrapper'
                )
            ) {

                closeProfileDropdown();

            }

        }
    );


    /* =========================================================
       MOBILE SIDEBAR CLOSE BUTTON
    ========================================================= */

    const mobileSidebarClose =
        document.getElementById(
            'mobileSidebarClose'
        );


    if (mobileSidebarClose) {

        mobileSidebarClose.addEventListener(
            'click',
            () => {
                closeMobileSidebar();
            }
        );

    }


});