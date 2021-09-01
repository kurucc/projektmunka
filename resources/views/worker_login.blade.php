@include('header')
<link rel="stylesheet" href={{ URL::asset('css/dolgozoi_login.css') }} />
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
@include('footer')