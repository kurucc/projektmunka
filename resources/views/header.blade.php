<!DOCTYPE html>
<html lang="hu ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src={{ URL::asset('js/login.js') }}></script>
    <script src={{ URL::asset('js/sidebar.js') }}></script>
    <link rel="stylesheet" href={{ URL::asset('css/sidebar.css') }} />
    <link rel="stylesheet" href={{ URL::asset('css/mainpage.css') }} />

    <title>{{ env('APP_NAME') }}</title>
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
              <a class="menuk nav-link" href={{ url('/') }}>Főoldal</a>
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
                  <a class="dropdown-item" href={{ url('products/csempe') }}>Csempék</a>
                  <a class="dropdown-item" href={{ url('products/parketta') }}>Parketták</a>
                </div>
              </div>
              <a class="menuk nav-link" href={{ url('technicians') }}
              >Szakember kereső</a>
              <a class="menuk nav-link" href={{ url('cart') }}>Kosár</a>
              @if (Auth::guard('employee')->check() || Auth::guard('buyer')->check())
              <a class="menuk nav-link" href={{ url('dashboard') }}>Profilom</a>
              @else
              <a class="menuk nav-link" href={{ url('auth') }}>Bejelentkezés</a>
              @endif
            </div>
          </div>
        </div>
      </nav>