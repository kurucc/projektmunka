<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}"><img src="{{ URL::asset('img/logo_white.png') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Cím: 9023 Győr, Teszt utca 123</li>
                        <li>E-mail: info@burkologic.hu</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Információk</h5>
                    <ul>
                        <li><a href="#">GYIK</a></li>
                        <li><a href="#">VALAMI</a></li>
                        <li><a href="{{ url('auth') }}">Bejelentkezés</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>Gyorslinkek</h5>
                    <ul>
                        <li><a href="{{ url('products/csempe') }}">Csempék</a></li>
                        <li><a href="{{ url('products/parketta') }}">Parketták</a></li>
                        <li><a href="{{ url('technicians') }}">Szakember kereső</a></li>
                        <li><a href="{{ url('cart') }}">Kosár</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Iratkozz fel hírlevelünkre</h5>
                    <p>Tudd meg elsőként a legújabb akcióinkat és ajánlatainkat.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="E-mail...">
                        <button class="btn" type="button">Feliratkozás</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Minden jog fenntartva &copy; 2021 | Burkologic
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.dd.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-hu_HU.min.js"></script>
</body>

</html>
