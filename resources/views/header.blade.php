<!DOCTYPE html>
<html lang="hu ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link
      rel="stylesheet"
      href="{{ URL::asset('css/mainpage.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ URL::asset('css/dashboard.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ URL::asset('css/products.css') }}"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src={{ URL::asset('js/login.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
