<style>
.footer-bookstore{
    width:100%;
    margin-top:80px;
    background:#003A70;
    color:#F5F9FF;
    padding:60px 0 20px;
}

.footer-bookstore h5{
    color:#FFFFFF;
    font-weight:600;
    margin-bottom:18px;
}

.footer-bookstore p,
.footer-bookstore li,
.footer-bookstore a{
    color:#DCEEFF;
    text-decoration:none;
    font-size:15px;
}

.footer-bookstore ul{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-bookstore ul li{
    margin-bottom:10px;
}

.footer-bookstore ul li a{
    transition:.3s;
}

.footer-bookstore ul li a:hover{
    color:#FFFFFF;
    padding-left:5px;
}

.footer-brand{
    font-size:28px;
    font-weight:700;
    color:#FFFFFF;
}

.footer-brand i{
    margin-right:8px;
    color:#EAF4FF;
}

.footer-desc{
    margin-top:18px;
    line-height:1.8;
    max-width:360px;
    color:#DCEEFF;
}

.social-icon{
    width:42px;
    height:42px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(255,255,255,.10);
    color:#FFFFFF;
    margin-right:8px;
    transition:.3s;
    font-size:18px;
    border:1px solid rgba(255,255,255,.12);
}

.social-icon:hover{
    background:#0078D7;
    color:#FFFFFF;
    transform:translateY(-3px);
}

.footer-divider{
    border-top:1px solid rgba(255,255,255,.15);
    margin-top:40px;
    padding-top:20px;
}

.footer-bottom{
    color:#BFD9EF;
    font-size:14px;
}

.footer-bottom strong{
    color:#FFFFFF;
}

.contact-item{
    margin-bottom:15px;
    color:#DCEEFF;
}

.contact-item i{
    color:#FFFFFF;
    margin-right:10px;
}

@media(max-width:768px){

    .footer-bookstore{
        text-align:center;
        padding:50px 20px 20px;
    }

    .footer-desc{
        margin:auto;
        margin-top:18px;
        margin-bottom:25px;
    }

    .social-icon{
        margin:0 4px;
    }

    .footer-bookstore h5{
        margin-top:10px;
    }

}
</style>

<footer class="footer-bookstore">

    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-5">

                <div class="footer-brand">
                    <i class="bi bi-book-half"></i>
                    Pustaka Nusantara
                </div>

                <p class="footer-desc">
                    Pustaka Nusantara adalah toko buku online yang menyediakan
                    berbagai koleksi buku berkualitas mulai dari novel,
                    pendidikan, teknologi, hingga komik dengan harga terbaik.
                </p>

                <div class="mt-4">

                    <a href="#" class="social-icon">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-3">

                <h5>Navigasi</h5>

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('books.customer') }}">
                            Koleksi Buku
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}">
                            Keranjang
                        </a>
                    </li>

                    @guest

                    <li>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                    @endguest

                </ul>

            </div>

            <div class="col-lg-4">

                <h5>Hubungi Kami</h5>

                <div class="contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    Klaten, Indonesia
                </div>

                <div class="contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    info@pustakanusantara.com
                </div>

                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    (+62)8123-456-789
                </div>

                <div class="contact-item">
                    <i class="bi bi-clock-fill"></i>
                    Senin - Sabtu • 08.00 - 20.00 WIB
                </div>

            </div>

        </div>

        <div class="footer-divider text-center">

            <div class="footer-bottom">
                © {{ date('Y') }}
                <strong>Pustaka Nusantara</strong>.
                All Rights Reserved.
            </div>

        </div>

    </div>

</footer>