@include('header')
<div class="">
    <div class="container flex align-items-center py-3 admin my-2">
        <h1 class="text-center control">Vezérlőpult</h1>

        <div class=" row py-3">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Üdv, {{ Auth::guard('employee')->user()->username }}!</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 align-items-end justify-content-end text-right">
                <a class="logout" href={{ url('logout') }}>
                    <button type="submit" class="btn btn-light logout-btn">Kijelentkezés</button>
                </a>
            </div>
        </div>

        <div class="row py-3">


            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a class="logout" href={{ url('dashboard/worker') }}>
                    <button type="submit" class="btn btn-dark logout-btn admin">Munkás felület</button>
                </a>
            </div>


        </div>

    </div>
</div>
@include('footer')
