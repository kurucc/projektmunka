@include('header')
<div class="">
    <div class="container flex align-items-center py-3 admin my-2">
        <h1 class="text-center control">Munkás felület</h1>
        <div class=" row py-3 text-center">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <a href={{ url('dashboard/worker/stats') }}><button type="submit" class="btn btn-dark logout-btn admin">Statisztikák</button></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <a href={{ url('dashboard/worker/order') }}><button type="submit" class="btn btn-dark logout-btn admin">Rendelés</button></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <a href={{ url('dashboard/worker/orders') }}><button type="submit" class="btn btn-dark logout-btn admin">Rendelések</button></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <a href={{ url('dashboard/worker/supplies') }}><button type="submit" class="btn btn-dark logout-btn admin">Készletek</button></a>
            </div>
        </div>
    </div>
</div>
@include('footer')
