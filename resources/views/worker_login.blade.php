<html lang="hu">
  <head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href={{ URL::asset('css/dolgozoi_login.css') }}
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
    <div class="dolgozoi_login_bg wrapper">
      <div class="card text-center">
        <div class="card-header">
          <h4>BurkoLogic - Dolgozói bejelentkező felület!<br /></h4>
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
        <div class="card-body">
          <h5>Jelentkezzen be!</h5>
          <form method="POST">
            @csrf
            <div>
              <h6>Login név</h6>
              <input
                type="loginname"
                id="loginname"
                placeholder="loginname"
                required
                name="username"
                class="form-control-sm"
              />
            </div>
            <div>
              <h6>Jelszó</h6>
              <input
                type="password"
                id="password"
                minlength="8"
                placeholder="password"
                required
                name="password"
                class="form-control-sm"
              />
              <br />
            </div>
            <div>
              <input
                type="submit"
                value="Login"
                class="btn btn-dark login"
              />
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>