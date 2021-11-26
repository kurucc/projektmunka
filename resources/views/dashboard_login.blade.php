@include('header')
<div class="">
    <div class="container py-3">
        <div class="row">
            <div class="col-6">
                <h2>Üdv, {{ Auth::guard('buyer')->user()->name }}!</h2>
            </div>

            <div class="col-6 text-right">
                <a class="logout" href={{ url('logout') }}>
                    <button type="submit" class="btn btn-light logout-btn">Kijelentkezés</button>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4 text-right">
                <a class="logout" href={{ url('dashboard/prevorders') }}>
                    <button type="submit" class="btn btn-dark admin">Előző rendelések</button>
                </a>
            </div>

            <div class="col-4 text-center">
                <a class="logout" href={{ url('dashboard/calculations') }}>
                    <button type="submit" class="btn btn-dark admin">Kalkulációk</button>
                </a>
            </div>

            <div class="col-4 text-left">
                <a class="logout" href={{ url('dashboard/profile') }}>
                    <button type="submit" class="btn btn-dark admin">Profil szerkesztése</button>
                </a>
            </div>
        </div>
    </div>
</div>
@include('footer')
