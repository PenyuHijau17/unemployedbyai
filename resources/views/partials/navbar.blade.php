<style>

/* ==========================================================
   IOS LIQUID GLASS NAVBAR
   PUSTAKA NUSANTARA
========================================================== */

.navbar-bookstore {
    position: relative;

    margin: 14px 20px 0;
    padding: 10px 14px;

    background:
        linear-gradient(
            135deg,
            rgba(0, 42, 82, .94),
            rgba(0, 91, 170, .90)
        );

    border: 1px solid rgba(255,255,255,.20);

    border-radius: 24px;

    backdrop-filter:
        blur(25px)
        saturate(180%);

    -webkit-backdrop-filter:
        blur(25px)
        saturate(180%);

    box-shadow:
        0 12px 35px rgba(0,45,90,.25),
        inset 0 1px 0 rgba(255,255,255,.25),
        inset 0 -1px 0 rgba(0,0,0,.12);

    z-index: 1000;
}


/* ==========================================================
   NAVBAR SHINE
========================================================== */

.navbar-bookstore::before {
    content: "";

    position: absolute;

    top: 0;
    left: 7%;
    right: 7%;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.65),
            transparent
        );

    pointer-events: none;
}


/* ==========================================================
   CONTAINER
========================================================== */

.navbar-bookstore .container {
    position: relative;
}


/* ==========================================================
   BACK BUTTON
========================================================== */

.btn-back {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-right: 12px;

    color: #fff;

    background:
        rgba(255,255,255,.10);

    border:
        1px solid
        rgba(255,255,255,.22);

    border-radius: 50%;

    backdrop-filter:
        blur(12px);

    -webkit-backdrop-filter:
        blur(12px);

    text-decoration: none !important;

    transition:
        transform .35s cubic-bezier(.22,1,.36,1),
        background .3s ease,
        color .3s ease,
        box-shadow .3s ease;
}

.btn-back:hover {
    color: #003A70;

    background: #D4AF37;

    transform:
        translateX(-3px);

    box-shadow:
        0 5px 18px
        rgba(212,175,55,.30);
}


/* ==========================================================
   BRAND
========================================================== */

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

    transition:
        transform .35s ease;
}

.navbar-brand:hover {
    color: #fff !important;

    transform:
        translateY(-1px);
}

.navbar-brand i {
    color: #D4AF37;

    filter:
        drop-shadow(
            0 0 7px
            rgba(212,175,55,.45)
        );
}


/* ==========================================================
   NAVIGATION WRAPPER
========================================================== */

.liquid-nav {

    position: relative;

    display: flex;

    align-items: center;

    gap: 4px;

    margin-left: auto;
    margin-right: auto;

    padding: 4px;

    /*
     * TINGGI FIX
     * Supaya kapsul Home tidak berubah menjadi garis.
     */
    height: 48px;

    /*
     * Bentuk luar pill
     */
    border-radius: 999px;

    overflow: visible;
}


/* ==========================================================
   LIQUID GLASS CAPSULE
========================================================== */

.liquid-glass {

    position: absolute;

    /*
     * Ukuran kapsul FIX
     */
    top: 4px;

    height: 40px;

    /*
     * Posisi awal
     */
    left: 0;

    /*
     * Lebar akan diatur JavaScript
     */
    width: 0;

    /*
     * PENTING:
     * SELALU PILL
     */
    border-radius: 999px;

    pointer-events: none;

    opacity: 0;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.23),
            rgba(255,255,255,.10)
        );

    border:
        1px solid
        rgba(255,255,255,.30);

    backdrop-filter:
        blur(18px)
        saturate(180%);

    -webkit-backdrop-filter:
        blur(18px)
        saturate(180%);

    box-shadow:
        inset 0 1px 0
        rgba(255,255,255,.42),

        inset 0 -1px 0
        rgba(255,255,255,.08),

        0 5px 18px
        rgba(0,0,0,.12);

    /*
     * PERPINDAHAN HALUS
     */
    transform:
        translate3d(0,0,0);

    transition:
        transform .55s cubic-bezier(.22,1,.36,1),
        width .45s cubic-bezier(.22,1,.36,1),
        opacity .2s ease;
}


/* ==========================================================
   GLASS HIGHLIGHT
========================================================== */

.liquid-glass::before {

    content: "";

    position: absolute;

    top: 1px;

    left: 12%;
    right: 12%;

    height: 1px;

    border-radius: 999px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.75),
            transparent
        );

    pointer-events: none;
}


/* ==========================================================
   GLASS LIGHT
========================================================== */

.liquid-glass::after {

    content: "";

    position: absolute;

    inset: 0;

    border-radius: inherit;

    background:
        radial-gradient(
            circle at
            var(--mouse-x, 50%)
            50%,

            rgba(255,255,255,.18),

            transparent 60%
        );

    pointer-events: none;
}


/* ==========================================================
   NAV ITEM
========================================================== */

.liquid-item {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 6px;

    height: 40px;

    padding:
        0 16px;

    color:
        rgba(255,255,255,.78) !important;

    background:
        transparent !important;

    border:
        none !important;

    border-bottom:
        none !important;

    border-radius:
        999px;

    text-decoration:
        none !important;

    text-decoration-line:
        none !important;

    outline:
        none !important;

    font-size:
        .95rem;

    font-weight:
        500;

    white-space:
        nowrap;

    transition:
        color .25s ease,
        transform .25s
        cubic-bezier(.22,1,.36,1);
}


/* ==========================================================
   REMOVE ALL UNDERLINE / DECORATION
========================================================== */

.liquid-item::before,
.liquid-item::after {

    display:
        none !important;

    content:
        none !important;
}


/* ==========================================================
   ACTIVE
========================================================== */

.liquid-item.active {

    color:
        #fff !important;

    background:
        transparent !important;

    border:
        none !important;

    border-bottom:
        none !important;

    text-decoration:
        none !important;
}


/* ==========================================================
   HOVER
========================================================== */

.liquid-item:hover {

    color:
        #fff !important;

    background:
        transparent !important;

    border:
        none !important;

    border-bottom:
        none !important;

    text-decoration:
        none !important;

    transform:
        translateY(-1px);
}


/* ==========================================================
   FOCUS
========================================================== */

.liquid-item:focus,
.liquid-item:focus-visible {

    color:
        #fff !important;

    background:
        transparent !important;

    border:
        none !important;

    outline:
        none !important;

    box-shadow:
        none !important;

    text-decoration:
        none !important;
}


/* ==========================================================
   ICON
========================================================== */

.liquid-item i {

    font-size:
        .95rem;

    transition:
        transform .3s
        cubic-bezier(.22,1,.36,1);
}

.liquid-item:hover i {

    transform:
        scale(1.08)
        rotate(-3deg);
}


/* ==========================================================
   MOUSE GLOW
========================================================== */

.liquid-nav::after {

    content: "";

    position: absolute;

    left:
        var(--cursor-x, 50%);

    top:
        var(--cursor-y, 50%);

    width:
        100px;

    height:
        100px;

    transform:
        translate(-50%, -50%);

    background:
        radial-gradient(
            circle,
            rgba(255,255,255,.12),
            transparent 70%
        );

    pointer-events:
        none;

    opacity:
        0;

    transition:
        opacity .25s ease;
}

.liquid-nav:hover::after {
    opacity: 1;
}


/* ==========================================================
   AUTH
========================================================== */

.navbar-auth {

    display: flex;

    align-items: center;
}


/* ==========================================================
   LOGIN
========================================================== */

.btn-login {

    color:
        #fff !important;

    background:
        rgba(255,255,255,.09);

    border:
        1px solid
        rgba(255,255,255,.25);

    border-radius:
        14px;

    padding:
        9px 17px;

    font-weight:
        500;

    backdrop-filter:
        blur(12px);

    -webkit-backdrop-filter:
        blur(12px);

    transition:
        all .3s ease;
}

.btn-login:hover {

    color:
        #003A70 !important;

    background:
        #fff;

    border-color:
        #fff;

    transform:
        translateY(-1px);

    box-shadow:
        0 7px 20px
        rgba(0,0,0,.15);
}


/* ==========================================================
   REGISTER
========================================================== */

.btn-register {

    color:
        #003A70 !important;

    background:
        #D4AF37;

    border:
        1px solid
        rgba(255,255,255,.30);

    border-radius:
        14px;

    padding:
        9px 17px;

    font-weight:
        700;

    box-shadow:
        0 5px 18px
        rgba(212,175,55,.28);

    transition:
        all .3s ease;
}

.btn-register:hover {

    color:
        #003A70 !important;

    background:
        #F8E8A8;

    transform:
        translateY(-1px);

    box-shadow:
        0 8px 22px
        rgba(212,175,55,.35);
}


/* ==========================================================
   USER DROPDOWN BUTTON
========================================================== */

.user-dropdown .dropdown-toggle {

    display:
        flex;

    align-items:
        center;

    gap:
        6px;

    color:
        #fff !important;

    background:
        rgba(255,255,255,.09);

    border:
        1px solid
        rgba(255,255,255,.22);

    border-radius:
        14px;

    padding:
        9px 14px;

    font-weight:
        500;

    backdrop-filter:
        blur(12px);

    -webkit-backdrop-filter:
        blur(12px);

    transition:
        all .3s ease;
}

.user-dropdown .dropdown-toggle:hover,
.user-dropdown .dropdown-toggle:focus {

    color:
        #fff !important;

    background:
        rgba(255,255,255,.18);

    border-color:
        rgba(255,255,255,.35);
}


/* ==========================================================
   DROPDOWN
========================================================== */

.user-dropdown .dropdown-menu {

    min-width:
        220px;

    margin-top:
        12px;

    padding:
        8px;

    border:
        1px solid
        rgba(255,255,255,.45);

    border-radius:
        18px;

    background:
        rgba(255,255,255,.94);

    backdrop-filter:
        blur(25px)
        saturate(180%);

    -webkit-backdrop-filter:
        blur(25px)
        saturate(180%);

    box-shadow:
        0 15px 40px
        rgba(0,0,0,.18);
}


/* ==========================================================
   DROPDOWN ITEM
========================================================== */

.user-dropdown .dropdown-item {

    display:
        flex;

    align-items:
        center;

    padding:
        11px 13px;

    margin:
        2px 0;

    border-radius:
        11px;

    color:
        #003A70;

    font-weight:
        500;

    transition:
        all .25s ease;
}

.user-dropdown .dropdown-item:hover {

    color:
        #003A70;

    background:
        rgba(0,91,170,.10);

    transform:
        translateX(3px);
}

.user-dropdown .dropdown-item i {

    width:
        22px;

    color:
        #005BAA;
}

.user-dropdown .dropdown-item:hover i {

    color:
        #D4AF37;
}


/* ==========================================================
   LOGOUT
========================================================== */

.btn-logout {

    color:
        #003A70 !important;

    background:
        #D4AF37;

    border:
        1px solid
        rgba(255,255,255,.30);

    border-radius:
        14px;

    padding:
        9px 17px;

    font-weight:
        700;

    transition:
        all .3s ease;
}

.btn-logout:hover {

    color:
        #003A70 !important;

    background:
        #F8E8A8;

    transform:
        translateY(-1px);

    box-shadow:
        0 8px 20px
        rgba(212,175,55,.30);
}


/* ==========================================================
   MOBILE TOGGLER
========================================================== */

.navbar-toggler {

    width:
        42px;

    height:
        42px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        0;

    border:
        1px solid
        rgba(255,255,255,.25) !important;

    border-radius:
        13px !important;

    background:
        rgba(255,255,255,.10) !important;

    backdrop-filter:
        blur(12px);

    -webkit-backdrop-filter:
        blur(12px);
}

.navbar-toggler:focus {

    box-shadow:
        none !important;
}

.navbar-toggler-icon {

    background-image:
        url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255,255,255,0.95%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}


/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 991px) {

    .navbar-bookstore {

        margin:
            10px 12px 0;

        padding:
            10px 12px;

        border-radius:
            20px;
    }


    .liquid-nav {

        width:
            100%;

        height:
            auto;

        margin:
            18px 0 0;

        padding:
            5px;

        flex-direction:
            column;

        align-items:
            stretch;

        background:
            rgba(0,25,55,.20);

        border:
            1px solid
            rgba(255,255,255,.12);

        border-radius:
            17px;
    }


    .liquid-item {

        justify-content:
            center;

        width:
            100%;

        height:
            42px;

        padding:
            0 15px;
    }


    .liquid-glass {

        display:
            none;
    }


    .liquid-nav::after {

        display:
            none;
    }


    .navbar-auth {

        width:
            100%;

        margin-top:
            15px;

        padding-top:
            15px;

        justify-content:
            center;

        border-top:
            1px solid
            rgba(255,255,255,.15);
    }
}


/* ==========================================================
   SMALL MOBILE
========================================================== */

@media (max-width: 575px) {

    .navbar-bookstore {

        margin:
            8px;

        border-radius:
            18px;
    }


    .navbar-brand {

        font-size:
            1rem;
    }


    .btn-back {

        width:
            36px;

        height:
            36px;
    }


    .navbar-auth {

        flex-direction:
            column;

        gap:
            8px;
    }


    .navbar-auth > *,
    .navbar-auth form,
    .navbar-auth .btn {

        width:
            100%;
    }


    .user-dropdown {

        width:
            100%;

        margin-right:
            0 !important;
    }


    .user-dropdown .dropdown-toggle {

        width:
            100%;

        justify-content:
            center;
    }
}


/* ==========================================================
   BODY
========================================================== */

body {

    background:
        radial-gradient(
            circle at 10% 5%,
            rgba(0,91,170,.10),
            transparent 28%
        ),

        radial-gradient(
            circle at 90% 15%,
            rgba(212,175,55,.08),
            transparent 25%
        ),

        #F5F7FA;
}

</style>


<!-- ==========================================================
     NAVBAR
========================================================== -->

<nav class="navbar navbar-expand-lg navbar-bookstore">

    <div class="container">


        <!-- ==================================================
             BACK
        ================================================== -->

        <a
            href="#"
            onclick="goBack(event)"
            class="btn-back"
            title="Kembali"
            aria-label="Kembali">

            <i class="bi bi-arrow-left"></i>

        </a>


        <!-- ==================================================
             BRAND
        ================================================== -->

        <a
            class="navbar-brand"
            href="{{ route('home') }}">

            <i class="bi bi-book-half"></i>

            Pustaka Nusantara

        </a>


        <!-- ==================================================
             MOBILE TOGGLER
        ================================================== -->

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


        <!-- ==================================================
             NAV COLLAPSE
        ================================================== -->

        <div
            class="collapse navbar-collapse"
            id="navbarNav">


            <!-- ==================================================
                 LIQUID NAVIGATION
            ================================================== -->

            <div
                class="liquid-nav"
                id="liquidNav">


                <!-- ==================================================
                     SINGLE LIQUID GLASS CAPSULE

                     Kapsul ini berpindah-pindah
                     mengikuti Home / Koleksi / Keranjang
                ================================================== -->

                <div
                    class="liquid-glass"
                    id="liquidGlass">
                </div>


                <!-- ==================================================
                     HOME
                ================================================== -->

                <a
                    href="{{ route('home') }}"
                    class="liquid-item {{ request()->routeIs('home') ? 'active' : '' }}">

                    <i class="bi bi-house-door"></i>

                    <span>Home</span>

                </a>


                <!-- ==================================================
                     KOLEKSI BUKU
                ================================================== -->

                <a
                    href="{{ route('books.customer') }}"
                    class="liquid-item {{ request()->routeIs('books.customer') ? 'active' : '' }}">

                    <i class="bi bi-book"></i>

                    <span>Koleksi Buku</span>

                </a>


                <!-- ==================================================
                     KERANJANG
                ================================================== -->

                <a
                    href="{{ route('cart.index') }}"
                    class="liquid-item {{ request()->routeIs('cart.index') ? 'active' : '' }}">

                    <i class="bi bi-cart3"></i>

                    <span>Keranjang</span>

                </a>


            </div>


            <!-- ==================================================
                 AUTH
            ================================================== -->

            @guest

                <div class="navbar-auth d-flex">


                    <!-- LOGIN -->

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-login me-2">

                        <i
                            class="bi bi-box-arrow-in-right me-1">
                        </i>

                        Masuk

                    </a>


                    <!-- REGISTER -->

                    <a
                        href="{{ route('register') }}"
                        class="btn btn-register">

                        <i
                            class="bi bi-person-plus me-1">
                        </i>

                        Daftar

                    </a>


                </div>


            @else


                <div
                    class="navbar-auth d-flex align-items-center">


                    <!-- ==================================================
                         USER DROPDOWN
                    ================================================== -->

                    <div
                        class="dropdown user-dropdown me-3">


                        <button
                            class="btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i
                                class="bi bi-person-circle">
                            </i>

                            {{ Auth::user()->name }}

                        </button>


                        <ul
                            class="dropdown-menu dropdown-menu-end">


                            <!-- ACCOUNT -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('customer.account') }}">

                                    <i
                                        class="bi bi-person me-2">
                                    </i>

                                    Akun Saya

                                </a>

                            </li>


                            <!-- ORDERS -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('customer.orders.index') }}">

                                    <i
                                        class="bi bi-box-seam me-2">
                                    </i>

                                    Pesanan Saya

                                </a>

                            </li>


                            <!-- ADDRESS -->

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('customer.address.index') }}">

                                    <i
                                        class="bi bi-geo-alt me-2">
                                    </i>

                                    Alamat

                                </a>

                            </li>


                        </ul>

                    </div>


                    <!-- ==================================================
                         LOGOUT
                    ================================================== -->

                    <form
                        action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-logout">

                            <i
                                class="bi bi-box-arrow-right me-1">
                            </i>

                            Logout

                        </button>

                    </form>


                </div>

            @endguest


        </div>

    </div>

</nav>


<!-- ==========================================================
     LIQUID GLASS JAVASCRIPT
========================================================== -->

<script>

document.addEventListener(
    "DOMContentLoaded",
    function () {


        /* ==================================================
           ELEMENT
        ================================================== */

        const nav =
            document.getElementById("liquidNav");

        const glass =
            document.getElementById("liquidGlass");


        if (!nav || !glass) {
            return;
        }


        const items =
            nav.querySelectorAll(".liquid-item");


        /* ==================================================
           MOVE GLASS
           
           Kita menggunakan TRANSFORM,
           bukan left.

           Hasilnya perpindahan lebih smooth.
        ================================================== */

        function moveGlass(item) {

            if (!item) {
                return;
            }


            const navRect =
                nav.getBoundingClientRect();


            const itemRect =
                item.getBoundingClientRect();


            const left =
                itemRect.left -
                navRect.left;


            const width =
                itemRect.width;


            /* ==============================================
               SET WIDTH
            ============================================== */

            glass.style.width =
                width + "px";


            /* ==============================================
               PINDAHKAN KAPSUL
            ============================================== */

            glass.style.transform =
                `translate3d(${left}px, 0, 0)`;


            /* ==============================================
               TAMPILKAN
            ============================================== */

            glass.style.opacity =
                "1";

        }


        /* ==================================================
           ACTIVE ITEM
        ================================================== */

        const active =
            nav.querySelector(
                ".liquid-item.active"
            );


        if (active) {

            requestAnimationFrame(
                function () {

                    moveGlass(active);

                }
            );

        }


        /* ==================================================
           HOVER
        ================================================== */

        items.forEach(
            function (item) {


                item.addEventListener(
                    "mouseenter",
                    function () {

                        moveGlass(item);

                    }
                );


                /* ==========================================
                   MOUSE MOVE
                ========================================== */

                item.addEventListener(
                    "mousemove",
                    function (event) {


                        const rect =
                            item.getBoundingClientRect();


                        const x =
                            event.clientX -
                            rect.left;


                        const percentage =
                            (x / rect.width) *
                            100;


                        glass.style.setProperty(
                            "--mouse-x",
                            percentage + "%"
                        );


                    }
                );


            }
        );


        /* ==================================================
           MOUSE LEAVE NAV
        ================================================== */

        nav.addEventListener(
            "mouseleave",
            function () {


                const activeItem =
                    nav.querySelector(
                        ".liquid-item.active"
                    );


                if (activeItem) {

                    moveGlass(activeItem);

                }

            }
        );


        /* ==================================================
           NAV MOUSE MOVE
        ================================================== */

        nav.addEventListener(
            "mousemove",
            function (event) {


                const rect =
                    nav.getBoundingClientRect();


                const x =
                    event.clientX -
                    rect.left;


                const y =
                    event.clientY -
                    rect.top;


                nav.style.setProperty(
                    "--cursor-x",
                    x + "px"
                );


                nav.style.setProperty(
                    "--cursor-y",
                    y + "px"
                );

            }
        );


        /* ==================================================
           RESIZE
        ================================================== */

        window.addEventListener(
            "resize",
            function () {


                const current =
                    nav.querySelector(
                        ".liquid-item.active"
                    );


                if (current) {

                    moveGlass(current);

                }

            }
        );


        /* ==================================================
           BOOTSTRAP COLLAPSE
           
           Setelah navbar mobile dibuka,
           posisi kapsul dihitung ulang.
        ================================================== */

        const collapse =
            document.getElementById("navbarNav");


        if (collapse) {

            collapse.addEventListener(
                "shown.bs.collapse",
                function () {

                    const current =
                        nav.querySelector(
                            ".liquid-item.active"
                        );


                    if (current) {

                        moveGlass(current);

                    }

                }
            );

        }


    }
);


/* ==========================================================
   BACK BUTTON
========================================================== */

function goBack(event) {

    event.preventDefault();


    if (document.referrer) {

        history.back();

    } else {

        window.location.href =
            "{{ route('home') }}";

    }

}

</script>