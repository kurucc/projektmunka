<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Burkologic</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
</head>

<body>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    info@burkologic.hu
                </div>
            </div>
            <div class="ht-right">
                <a href="{{ url('auth') }}" class="login-panel"><i class="fa fa-user"></i>Bejelentkezés</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ URL::asset('img/logo_dark.png') }}" alt="" style="width: 120px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-right col-md-6 float-right">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>{{\Cart::session(Auth::guard('buyer')->id())->getTotalQuantity()}}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        @foreach(\Cart::session(Auth::guard('buyer')->id())->getContent() as $row)
                                            <tr>
                                                <td class="si-pic"><img src="{{ URL::asset($row->picture_path) }}"
                                                                        alt=""></td>
                                            </tr>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>{{ $row->price }} Ft x {{ $row->quantity }}</p>
                                                    <h6>{{ $row->name }}</h6>
                                                </div>
                                            </td>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>összesen:</span>
                                    <h5>{{\Cart::session(Auth::guard('buyer')->id())->getTotal()}} Ft</h5>
                                </div>
                                <div class="select-button">
                                    <a href="{{ url('cart') }}" class="primary-btn view-card">Kosár</a>
                                    <a href="#" class="primary-btn checkout-btn">Fizetés</a>
                                </div>
                            </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item text-center">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="{{ url('/')}}">Főoldal</a></li>
                    <li><a>Termékek</a>
                        <ul class="dropdown">
                            <li><a href="{{ url('products/csempe') }}">Csempék</a></li>
                            <li><a href="{{ url('products/parketta') }}">Parketták</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('technicians') }}">Szakember kereső</a></li>
                    <li><a href="#">Összes oldal</a>
                        <ul class="dropdown">
                            <li><a href="{{ url('products/csempe') }}">Csempék</a></li>
                            <li><a href="{{ url('products/parketta') }}">Parketták</a></li>
                            <li><a href="./check-out.html">Fizetés</a></li>
                            <li><a href="{{ url('cart') }}">Kosár</a></li>
                            <li><a href="{{ url('auth') }}">Bejelentkezés</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
