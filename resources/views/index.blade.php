{{--<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>BurkoLogic</title>
    <base href="/" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="{{ URL::asset('css/mainpage.css') }}"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom">
      <button
        class="navbar-toggler navbar-light"
        type="button"
        data-toggle="collapse"
        data-target="#navbarToggleExternalContent"
        aria-controls="navbarToggleExternalContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
          <div class="navbar-nav ms-auto">
            <a class="menuk nav-link">Főoldal</a>
            <div class="nav-item dropdown">
              <a
                class="nav-link menuk dropdown-toggle"
                href="products"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Termékek
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="products/csempe">Csempék</a>
                <a class="dropdown-item" href="products/parketta">Parketták</a>
              </div>
            </div>
            <a class="menuk nav-link" href={{ url('technicians') }}>Szakember kereső</a>
            <a class="menuk nav-link">Kosár</a>
            @if (Auth::guard('employee')->check() || Auth::guard('buyer')->check())
            <a class="menuk nav-link" href={{ url('dashboard') }}>Profilom</a>
            @else
            <a class="menuk nav-link" href={{ url('auth') }}>Bejelentkezés</a>
            @endif
          </div>
        </div>
      </div>
    </nav>

    <div class="bg">
        <div class="welcome"></div>
        <div class="products"></div>
        <div class="technicians"></div>
    </div>
  </body>
</html>--}}

@include('header')

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="btn primary-btn">Shop Now</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="btn primary-btn">Shop Now</a>
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

<!-- Instagram Section Begin -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
</div>
<!-- Footer Section Begin -->
@include('footer')
