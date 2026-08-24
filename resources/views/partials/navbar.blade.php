<style>

/* =========================================================
   NAVBAR BASE
   ========================================================= */

.navbar-bookstore {
    position: sticky;
    top: 14px;
    z-index: 1050;

    margin: 14px 20px 0;
    padding: 10px 14px;

    background:
        linear-gradient(
            135deg,
            rgba(0, 42, 82, .96),
            rgba(0, 91, 170, .94)
        );

    border: 1px solid rgba(255,255,255,.20);
    border-radius: 24px;

    backdrop-filter: blur(20px) saturate(150%);
    -webkit-backdrop-filter: blur(20px) saturate(150%);

    box-shadow:
        0 12px 35px rgba(0,45,90,.25),
        inset 0 1px 0 rgba(255,255,255,.20),
        inset 0 -1px 0 rgba(0,0,0,.10);

    transition:
        background .8s cubic-bezier(.22,1,.36,1),
        border-color .8s cubic-bezier(.22,1,.36,1),
        box-shadow .8s cubic-bezier(.22,1,.36,1),
        backdrop-filter .8s cubic-bezier(.22,1,.36,1),
        -webkit-backdrop-filter .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        border-radius .8s cubic-bezier(.22,1,.36,1);

    will-change: background, backdrop-filter, box-shadow, transform;
    isolation: isolate;
}


/* =========================================================
   SCROLLED STATE — BENING / LIQUID GLASS ASLI
   ========================================================= */

.navbar-bookstore.scrolled {

    /* Beneran transparan/bening, bukan biru lagi */
    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.35),
            rgba(255,255,255,.15)
        );

    border-color: rgba(255,255,255,.45);

    /* blur tinggi = efek kaca iOS */
    backdrop-filter: blur(35px) saturate(200%);
    -webkit-backdrop-filter: blur(35px) saturate(200%);

    box-shadow:
        0 10px 35px rgba(0,0,0,.15),
        inset 0 1px 0 rgba(255,255,255,.5),
        inset 0 -1px 0 rgba(255,255,255,.1);

    transform: translateY(-4px) scale(.985);
    border-radius: 20px;
}

/* =========================================================
   FONT/ICON JADI GELAP + SOLID SAAT SCROLLED
   biar tetap jelas kebaca di atas background bening
   ========================================================= */

.navbar-bookstore.scrolled .navbar-brand,
.navbar-bookstore.scrolled .liquid-item,
.navbar-bookstore.scrolled .btn-back,
.navbar-bookstore.scrolled .btn-login,
.navbar-bookstore.scrolled .user-dropdown .dropdown-toggle {
    color: #00253F !important;
    text-shadow: none;
}

.navbar-bookstore.scrolled .liquid-item.active,
.navbar-bookstore.scrolled .liquid-item:hover {
    color: #001A2E !important;
}

.navbar-bookstore.scrolled .navbar-brand i {
    color: #B8860B;
}

.navbar-bookstore.scrolled .btn-back {
    background: rgba(0,37,63,.08);
    border-color: rgba(0,37,63,.18);
}

.navbar-bookstore.scrolled .btn-login {
    background: rgba(0,37,63,.08);
    border-color: rgba(0,37,63,.25);
}

.navbar-bookstore.scrolled .user-dropdown .dropdown-toggle {
    background: rgba(0,37,63,.08);
    border-color: rgba(0,37,63,.22);
}

.navbar-bookstore.scrolled .navbar-toggler-icon {
    filter: invert(0);
}


/* =========================================================
   SHINE
   ========================================================= */

.navbar-bookstore::before {
    content: "";
    position: absolute;
    top: 0;
    left: 7%;
    right: 7%;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.65), transparent);
    pointer-events: none;
    opacity: .8;
    transition: opacity .8s ease;
}

.navbar-bookstore.scrolled::before {
    opacity: .6;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.9), transparent);
}


/* =========================================================
   CONTAINER
   ========================================================= */

.navbar-bookstore .container {
    position: relative;
}


/* =========================================================
   BACK BUTTON
   ========================================================= */

.btn-back {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    color: #fff;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 50%;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    text-decoration: none !important;
    transition:
        transform .4s cubic-bezier(.22,1,.36,1),
        background .5s ease,
        color .5s ease,
        box-shadow .5s ease;
}

.btn-back:hover {
    color: #003A70;
    background: #D4AF37;
    transform: translateX(-3px) scale(1.04);
    box-shadow: 0 5px 18px rgba(212,175,55,.30);
}


/* =========================================================
   BRAND
   ========================================================= */

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #fff !important;
    font-size: 1.35rem;
    font-weight: 700;
    letter-spacing: .3px;
    white-space: nowrap;
    text-decoration: none !important;
    transition: transform .45s cubic-bezier(.22,1,.36,1), opacity .5s ease, color .5s ease;
}

.navbar-brand:hover {
    transform: translateY(-1px) scale(1.01);
}

.navbar-brand i {
    color: #D4AF37;
    filter: drop-shadow(0 0 7px rgba(212,175,55,.45));
    transition: transform .6s cubic-bezier(.22,1,.36,1), filter .6s ease, color .5s ease;
}

.navbar-brand:hover i {
    transform: rotate(-8deg) scale(1.08);
    filter: drop-shadow(0 0 12px rgba(212,175,55,.65));
}


/* =========================================================
   LIQUID NAV
   ========================================================= */

.liquid-nav {
    position: relative;
    display: flex;
    align-items: center;
    gap: 4px;
    margin-left: auto;
    margin-right: auto;
    padding: 4px;
    height: 48px;
    border-radius: 999px;
    overflow: visible;
}


/* =========================================================
   LIQUID GLASS CAPSULE
   ========================================================= */

.liquid-glass {
    position: absolute;
    top: 4px;
    left: 0;
    height: 40px;
    width: 0;
    border-radius: 999px;
    pointer-events: none;
    opacity: 0;
    background: linear-gradient(135deg, rgba(255,255,255,.23), rgba(255,255,255,.08));
    border: 1px solid rgba(255,255,255,.30);
    backdrop-filter: blur(18px) saturate(180%);
    -webkit-backdrop-filter: blur(18px) saturate(180%);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.42),
        inset 0 -1px 0 rgba(255,255,255,.08),
        0 5px 18px rgba(0,0,0,.12);
    transform: translate3d(0,0,0);
    transition:
        transform .7s cubic-bezier(.16,1,.3,1),
        width .6s cubic-bezier(.16,1,.3,1),
        opacity .25s ease;
    will-change: transform, width;
}

.navbar-bookstore.scrolled .liquid-glass {
    background: linear-gradient(135deg, rgba(0,37,63,.10), rgba(0,37,63,.04));
    border-color: rgba(0,37,63,.18);
}


/* =========================================================
   GLASS HIGHLIGHT
   ========================================================= */

.liquid-glass::before {
    content: "";
    position: absolute;
    top: 1px;
    left: 12%;
    right: 12%;
    height: 1px;
    border-radius: 999px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.75), transparent);
}


/* =========================================================
   GLASS LIGHT
   ========================================================= */

.liquid-glass::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: radial-gradient(circle at var(--mouse-x, 50%) 50%, rgba(255,255,255,.18), transparent 60%);
    pointer-events: none;
}


/* =========================================================
   NAV ITEM
   ========================================================= */

.liquid-item {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    height: 40px;
    padding: 0 16px;
    color: rgba(255,255,255,.78) !important;
    background: transparent !important;
    border: none !important;
    border-radius: 999px;
    text-decoration: none !important;
    outline: none !important;
    font-size: .95rem;
    font-weight: 500;
    white-space: nowrap;
    transition: color .45s ease, transform .45s cubic-bezier(.22,1,.36,1);
}

.liquid-item.active {
    color: #fff !important;
}

.liquid-item:hover {
    color: #fff !important;
    transform: translateY(-1px);
}

.liquid-item i {
    font-size: .95rem;
    transition: transform .5s cubic-bezier(.22,1,.36,1);
}

.liquid-item:hover i {
    transform: scale(1.12) rotate(-4deg);
}


/* =========================================================
   MOUSE GLOW
   ========================================================= */

.liquid-nav::after {
    content: "";
    position: absolute;
    left: var(--cursor-x, 50%);
    top: var(--cursor-y, 50%);
    width: 120px;
    height: 120px;
    transform: translate(-50%, -50%);
    background: radial-gradient(circle, rgba(255,255,255,.12), transparent 70%);
    pointer-events: none;
    opacity: 0;
    transition: opacity .35s ease;
}

.liquid-nav:hover::after {
    opacity: 1;
}

.navbar-bookstore.scrolled .liquid-nav::after {
    background: radial-gradient(circle, rgba(0,37,63,.08), transparent 70%);
}


/* =========================================================
   AUTH
   ========================================================= */

.navbar-auth {
    display: flex;
    align-items: center;
}


/* =========================================================
   LOGIN
   ========================================================= */

.btn-login {
    color: #fff !important;
    background: rgba(255,255,255,.09);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 14px;
    padding: 9px 17px;
    font-weight: 500;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    transition: all .45s cubic-bezier(.22,1,.36,1);
}

.btn-login:hover {
    color: #003A70 !important;
    background: #fff;
    border-color: #fff;
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 7px 20px rgba(0,0,0,.15);
}


/* =========================================================
   REGISTER
   ========================================================= */

.btn-register {
    color: #003A70 !important;
    background: #D4AF37;
    border: 1px solid rgba(255,255,255,.30);
    border-radius: 14px;
    padding: 9px 17px;
    font-weight: 700;
    box-shadow: 0 5px 18px rgba(212,175,55,.28);
    transition: all .45s cubic-bezier(.22,1,.36,1);
}

.btn-register:hover {
    background: #F8E8A8;
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 8px 22px rgba(212,175,55,.35);
}


/* =========================================================
   USER DROPDOWN
   ========================================================= */

.user-dropdown .dropdown-toggle {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #fff !important;
    background: rgba(255,255,255,.09);
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 14px;
    padding: 9px 14px;
    font-weight: 500;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    transition: all .45s cubic-bezier(.22,1,.36,1);
}

.user-dropdown .dropdown-toggle:hover {
    background: rgba(255,255,255,.18);
    transform: translateY(-2px);
}

.navbar-bookstore.scrolled .user-dropdown .dropdown-toggle:hover {
    background: rgba(0,37,63,.14);
}


/* =========================================================
   DROPDOWN
   ========================================================= */

.user-dropdown .dropdown-menu {
    min-width: 220px;
    margin-top: 12px;
    padding: 8px;
    border: 1px solid rgba(255,255,255,.45);
    border-radius: 18px;
    background: rgba(255,255,255,.94);
    backdrop-filter: blur(25px) saturate(180%);
    -webkit-backdrop-filter: blur(25px) saturate(180%);
    box-shadow: 0 15px 40px rgba(0,0,0,.18);
    animation: dropdownSmooth .35s cubic-bezier(.22,1,.36,1);
}

@keyframes dropdownSmooth {
    from { opacity: 0; transform: translateY(-8px) scale(.97); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}


/* =========================================================
   DROPDOWN ITEM
   ========================================================= */

.user-dropdown .dropdown-item {
    display: flex;
    align-items: center;
    padding: 11px 13px;
    margin: 2px 0;
    border-radius: 11px;
    color: #003A70;
    font-weight: 500;
    transition: all .35s cubic-bezier(.22,1,.36,1);
}

.user-dropdown .dropdown-item:hover {
    color: #003A70;
    background: rgba(0,91,170,.10);
    transform: translateX(4px);
}

.user-dropdown .dropdown-item i {
    width: 22px;
    color: #005BAA;
    transition: color .3s ease, transform .3s ease;
}

.user-dropdown .dropdown-item:hover i {
    color: #D4AF37;
    transform: scale(1.1);
}


/* =========================================================
   LOGOUT
   ========================================================= */

.btn-logout {
    color: #003A70 !important;
    background: #D4AF37;
    border: 1px solid rgba(255,255,255,.30);
    border-radius: 14px;
    padding: 9px 17px;
    font-weight: 700;
    transition: all .45s cubic-bezier(.22,1,.36,1);
}

.btn-logout:hover {
    background: #F8E8A8;
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 8px 20px rgba(212,175,55,.30);
}


/* =========================================================
   MOBILE TOGGLER
   ========================================================= */

.navbar-toggler {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border: 1px solid rgba(255,255,255,.25) !important;
    border-radius: 13px !important;
    background: rgba(255,255,255,.10) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.navbar-toggler:focus {
    box-shadow: none !important;
}

.navbar-bookstore.scrolled .navbar-toggler {
    background: rgba(0,37,63,.08) !important;
    border-color: rgba(0,37,63,.22) !important;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 991px) {

    .navbar-bookstore {
        margin: 10px 12px 0;
        padding: 10px 12px;
        border-radius: 20px;
    }

    .navbar-bookstore.scrolled {
        transform: translateY(-3px) scale(.99);
        border-radius: 18px;
    }

    .liquid-nav {
        width: 100%;
        height: auto;
        margin: 18px 0 0;
        padding: 5px;
        flex-direction: column;
        align-items: stretch;
        background: rgba(0,25,55,.20);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 17px;
    }

    .navbar-bookstore.scrolled .liquid-nav {
        background: rgba(0,37,63,.06);
        border-color: rgba(0,37,63,.15);
    }

    .liquid-item {
        justify-content: center;
        width: 100%;
        height: 42px;
    }

    .liquid-glass {
        display: none;
    }

    .liquid-nav::after {
        display: none;
    }

    .navbar-auth {
        width: 100%;
        margin-top: 15px;
        padding-top: 15px;
        justify-content: center;
        border-top: 1px solid rgba(255,255,255,.15);
    }

    .navbar-bookstore.scrolled .navbar-auth {
        border-top-color: rgba(0,37,63,.15);
    }
}


/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 575px) {

    .navbar-bookstore {
        margin: 8px;
        border-radius: 18px;
    }

    .navbar-brand {
        font-size: 1rem;
    }

    .btn-back {
        width: 36px;
        height: 36px;
    }

    .navbar-auth {
        flex-direction: column;
        gap: 8px;
    }

    .navbar-auth > *,
    .navbar-auth form,
    .navbar-auth .btn {
        width: 100%;
    }

    .user-dropdown {
        width: 100%;
        margin-right: 0 !important;
    }

    .user-dropdown .dropdown-toggle {
        width: 100%;
        justify-content: center;
    }
}


/* =========================================================
   REDUCE MOTION
   ========================================================= */

@media (prefers-reduced-motion: reduce) {
    .navbar-bookstore,
    .liquid-glass,
    .liquid-item,
    .navbar-brand,
    .btn-login,
    .btn-register,
    .btn-logout {
        transition-duration: .01ms !important;
    }
}

</style>


<nav class="navbar navbar-expand-lg navbar-bookstore">

    <div class="container">

        {{-- BACK --}}
        <a href="#" onclick="goBack(event)" class="btn-back" title="Kembali" aria-label="Kembali">
            <i class="bi bi-arrow-left"></i>
        </a>


        {{-- BRAND --}}
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-book-half"></i>
            Pustaka Nusantara
        </a>


        {{-- MOBILE --}}
        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- LIQUID NAV --}}
            <div class="liquid-nav" id="liquidNav">

                <div class="liquid-glass" id="liquidGlass"></div>

                <a href="{{ route('home') }}" class="liquid-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i>
                    <span>Home</span>
                </a>

                <a href="{{ route('books.customer') }}" class="liquid-item {{ request()->routeIs('books.customer') ? 'active' : '' }}">
                    <i class="bi bi-book"></i>
                    <span>Koleksi Buku</span>
                </a>

                <a href="{{ route('cart.index') }}" class="liquid-item {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                    <i class="bi bi-cart3"></i>
                    <span>Keranjang</span>
                </a>

            </div>


            {{-- AUTH --}}
            @guest

                <div class="navbar-auth d-flex">

                    <a href="{{ route('login') }}" class="btn btn-login me-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Masuk
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-register">
                        <i class="bi bi-person-plus me-1"></i>
                        Daftar
                    </a>

                </div>

            @else

                <div class="navbar-auth d-flex align-items-center">

                    {{-- USER --}}
                    <div class="dropdown user-dropdown me-3">

                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="{{ route('customer.account') }}">
                                    <i class="bi bi-person me-2"></i>
                                    Akun Saya
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('customer.orders.index') }}">
                                    <i class="bi bi-box-seam me-2"></i>
                                    Pesanan Saya
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('customer.address.index') }}">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    Alamat
                                </a>
                            </li>

                        </ul>

                    </div>


                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout">
                            <i class="bi bi-box-arrow-right me-1"></i>
                            Logout
                        </button>
                    </form>

                </div>

            @endguest

        </div>

    </div>

</nav>


<script>

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       SCROLL EFFECT
       ===================================================== */

    const navbar = document.querySelector(".navbar-bookstore");

    let ticking = false;

    function updateNavbar() {
        const scrollY = window.scrollY;

        if (scrollY > 12) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }

        ticking = false;
    }

    window.addEventListener("scroll", function () {
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    }, { passive: true });

    updateNavbar();


    /* =====================================================
       LIQUID GLASS
       ===================================================== */

    const nav = document.getElementById("liquidNav");
    const glass = document.getElementById("liquidGlass");

    if (!nav || !glass) {
        return;
    }

    const items = nav.querySelectorAll(".liquid-item");

    function moveGlass(item) {
        if (!item) {
            return;
        }

        const navRect = nav.getBoundingClientRect();
        const itemRect = item.getBoundingClientRect();

        const left = itemRect.left - navRect.left;
        const width = itemRect.width;

        glass.style.width = width + "px";
        glass.style.transform = `translate3d(${left}px,0,0)`;
        glass.style.opacity = "1";
    }

    const active = nav.querySelector(".liquid-item.active");

    if (active) {
        requestAnimationFrame(function () {
            moveGlass(active);
        });
    }


    /* =====================================================
       HOVER
       ===================================================== */

    items.forEach(function (item) {

        item.addEventListener("mouseenter", function () {
            moveGlass(item);
        });

        item.addEventListener("mousemove", function (event) {
            const rect = item.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const percentage = (x / rect.width) * 100;

            glass.style.setProperty("--mouse-x", percentage + "%");
        });

    });


    /* =====================================================
       MOUSE LEAVE
       ===================================================== */

    nav.addEventListener("mouseleave", function () {
        const activeItem = nav.querySelector(".liquid-item.active");

        if (activeItem) {
            moveGlass(activeItem);
        }
    });


    /* =====================================================
       MOUSE GLOW
       ===================================================== */

    nav.addEventListener("mousemove", function (event) {
        const rect = nav.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        nav.style.setProperty("--cursor-x", x + "px");
        nav.style.setProperty("--cursor-y", y + "px");
    });


    /* =====================================================
       RESIZE
       ===================================================== */

    window.addEventListener("resize", function () {
        const current = nav.querySelector(".liquid-item.active");

        if (current) {
            requestAnimationFrame(function () {
                moveGlass(current);
            });
        }
    });


    /* =====================================================
       BOOTSTRAP MOBILE
       ===================================================== */

    const collapse = document.getElementById("navbarNav");

    if (collapse) {
        collapse.addEventListener("shown.bs.collapse", function () {
            const current = nav.querySelector(".liquid-item.active");

            if (current) {
                requestAnimationFrame(function () {
                    moveGlass(current);
                });
            }
        });
    }

});


/* =========================================================
   BACK BUTTON
   ========================================================= */

function goBack(event) {
    event.preventDefault();

    if (document.referrer) {
        history.back();
    } else {
        window.location.href = "{{ route('home') }}";
    }
}

</script>