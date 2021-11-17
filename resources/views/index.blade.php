@include('header')

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h1>Parketták</h1>
                        <p>Nálunk a legjobb minőségű parkettákat találja meg nagyszerű áron! Valósítsa meg álmai otthonát termékeinkkel!</p>
                        <a href="{{ url('/products/parketta') }}" class="btn primary-btn">Tovább a parkettákhoz!</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h1>Csempék</h1>
                        <p>Találja meg kedvenc csempéjét a termékeink között! Csempéinkkel a fürdőszobai relaxálás még mesésebb lesz!</p>
                        <a href="{{ url('/products/csempe') }}" class="btn primary-btn">Tovább a csempékhez!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <a href="{{ url('products/parketta') }}">
                    <div class="single-banner">
                        <img src="img/parketta.jpg" alt="">
                        <div class="inner-text">
                            <h4>Parketták</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-6">
                <a href="{{ url('products/csempe') }}">
                    <div class="single-banner">
                        <img src="img/csempe.jpg" alt="">
                        <div class="inner-text">
                            <h4>Csempék</h4>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Banner Section End -->

@include('footer')
