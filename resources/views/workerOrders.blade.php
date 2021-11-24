@include('header')
<div class="">
    <div class="container flex align-items-center py-3 admin my-2">
        <h1 class="text-center control">Rendelések</h1>
        <div class=" row py-3 text-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href={{ url('dashboard/worker/orders/buyers') }}><button type="submit" class="btn btn-dark logout-btn admin">Vásárlók rendelései</button></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href={{ url('dashboard/worker/orders/workers') }}><button type="submit" class="btn btn-dark logout-btn admin">Dolgozói rendelések</button></a>
            </div>
        </div>
    </div>
</div>
@include('footer')
