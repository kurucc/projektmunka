<html lang="hu">
  <head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href={{ URL::asset('css/mainpage.css') }}
    />
    <link
      rel="stylesheet"
      href={{ URL::asset('css/login.css') }}
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src={{ URL::asset('js/login.js') }}></script>
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
            <a class="menuk nav-link" href='/'> Főoldal </a>
            <div class="nav-item dropdown">
              <a
                class="nav-link menuk dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Termékek
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Csempék</a>
                <a class="dropdown-item" href="#">Parketták</a>
              </div>
            </div>
            <a class="menuk nav-link">Szakember kereső</a>
            <a class="menuk nav-link">Kosár</a>
            @if (Auth::check())
              <a class="menuk nav-link" href="dashboard">Profilom</a>
            @endif
          </div>
        </div>
      </div>
    </nav>

    <div class="login_bg wrapper">
      <div class="card text-center">
        <div class="card-header">
          <h4>Üdvözöljük a BurkoLogic oldalán!<br /></h4>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Hoppá! Valami hiba történt!</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        @if (\Session::has('siker'))
        <div class="alert alert-success">
            <p><strong>Juhé, siker!</strong></p>
            <ul>
                <li>{!! \Session::get('siker') !!}</li>
            </ul>
        </div>
        @endif
        <div class="card-body">
          <h5>Jelentkezzen be!</h5>
          <form method="post">
              @csrf
            <div>
              <h6>Login név:</h6>
              <input
                type="text"
                id="username"
                placeholder="Felhasználónév..."
                required
                name="username"
                class="form-control-sm"
              />
            </div>
            <div>
              <h6>Jelszó:</h6>
              <input
                type="password"
                id="password"
                placeholder="Jelszó..."
                required
                name="password"
                class="form-control-sm"
              />

              <br />
              <div class="forgotten">Elfelejtette a jelszavát?</div>
            </div>
            <div>
            <button type="submit" class="btn btn-outline-light login" name="login">Bejelentkezés</button>
            </div>
          </form>
          <div class="card-footer">
            <div>
              <h6>Nincs még profilja?</h6>
            </div>
            <button
              type="button"
              class="btn btn-outline-light register text-center"
              data-toggle="modal"
              data-target="#registrationModal"
            >
              Regisztráció
            </button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="registrationModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="registrationModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrationModalLabel">
              Regisztráció
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
            @csrf
              <div class="row">
                <div class="col-sm-6">
                  <label>Keresztnév</label>
                  <input
                    type="text"
                    class="form-control-sm"
                    name="firstname"
                    required
                    placeholder="Peter"
                  />
                </div>
                <div class="col-sm-6">
                  <label>Vezetéknév</label>
                  <input
                    type="text"
                    name="lastname"
                    class="form-control-sm"
                    required
                    placeholder="Pelda"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Felhasználónév</label>
                  <input
                    type="text"
                    name="felhasználónév"
                    class="form-control-sm"
                    required
                    placeholder="peldapeter"
                  />
                </div>
                <div class="col-sm-6">
                <label>Jelszó</label><br>
                  <input
                    type="password"
                    name="password"
                    class="form-control-sm"
                    required
                    placeholder="peldapeter"
                  />

                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Telefonszám</label>
                  <input
                    type="text"
                    name="tel"
                    class="form-control-sm"
                    placeholder="+36123456789"
                  />
                </div>
                <div class="col-sm-6">
                  <label>Email cím</label>
                  <input
                    type="email"
                    class="form-control-sm"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    name="email"
                    required
                    placeholder="pelda@pelda.com"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Születési idő</label>
                  <input
                    type="date"
                    name="birthday"
                    class="form-control-sm"
                    required
                  />
                </div>
              </div>

              <div class="row">
                <label><h5>Szállítási adatok</h5></label>
                <div class="col-sm-6">
                  <label>Irányítószám</label>
                  <input type="text" class="form-control-sm" name="delivery_zip" required />
                </div>
                <div class="col-sm-6">
                  <label>Település</label>
                  <input type="text" class="form-control-sm" name="delivery_city" required />
                </div>
              </div>

              <div class="row">
                <label>Cím</label>
                <input type="text" class="form-control-sm" name="delivery_address" required />
              </div>
              <div class="row">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="megegyeznek"
                    checked
                    onclick="dataEquals()"
                  />
                  <label class="form-check-label" for="flexCheckChecked">
                    Számlázási adatok megegyeznek a szállítási adatokkal
                  </label>
                </div>
              </div>
              <div class="row maganszemely" style="display:none">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="individual"
                    checked
                    onclick="isIndividual()"
                  />
                  <label class="form-check-label" for="flexCheckChecked">
                    Magánszemély vagyok
                  </label>
                </div>
              </div>

              <div class="maganszemely" style="display:none">
                <!--If a person this one shows up-->
                <div class="row person" id="person" style="display:''">
                  <div class="col-sm-6">
                    <label>Keresztnév</label>
                    <input
                      type="text"
                      class="form-control-sm personreq"
                      placeholder="Peter"
                    />
                  </div>
                  <div class="col-sm-6">
                    <label>Vezetéknév</label>
                    <input
                      type="text"
                      class="form-control-sm personreq"
                      placeholder="Pelda"
                    />
                  </div>
                </div>
                <!--If a company this one shows up-->
                <div class="row company" id="company" style="display:none">
                  <div class="col-sm-6">
                    <label>Cég név</label>
                    <input type="text" class="form-control-sm companyreq"  />
                  </div>
                  <div class="col-sm-6">
                    <label>Adószám</label>
                    <input type="text" class="form-control-sm companyreq" />
                  </div>
                </div>
                <div class="row">
                  <label><h5>Számlázási cím</h5></label>
                  <div class="col-sm-6">
                    <label>Irányítószám</label>
                    <input type="text" name="invoice_zip" class="form-control-sm szallitasreq" />
                  </div>
                  <div class="col-sm-6">
                    <label>Település</label>
                    <input type="text" class="form-control-sm szallitasreq" />
                  </div>
                </div>

                <div class="row">
                  <label>Cím</label>
                  <input type="text" class="form-control-sm szallitasreq" />
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Bezárás
            </button>
            <input type="submit" value="Regisztráció" name="register" class="btn btn-dark">
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
