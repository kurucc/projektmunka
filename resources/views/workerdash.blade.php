@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Statisztikák</h2></div>

<div class="container my-2">

    <form action={{ url('/dashboard/worker/stats') }} method="get">
        <div class="row text-center">
            <div class="col-12">
                <label>Válasszon időszakot!</label><br>
                <input class="form-control-sm" type="date" name="dateFrom" value={{ $from }}>
                <input class="form-control-sm" type="date" name="dateTo" value= {{ $to }}>
                <input class="btn btn-dark logout-btn admin" type="submit" value="Beállít">
            </div>
        </div>
    </form>
    <div class="row my-2">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <h4><b>Készletek</b></h4>
            <p><span style="color: black !important; font-weight: 600;">Csempe készlet: </span> {{ $csempeCount }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Parketta készlet: </span> {{ $parkettaCount }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Összes készlet: </span>{{ $sumCount }} db</p>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <h4><b>Árak</b></h4>
            <p><span style="color: black !important; font-weight: 600;">A parketták maximális ára: </span> {{ $parkettaMaxPrice }} Ft</p>
            <p><span style="color: black !important; font-weight: 600;">A csempék maximális ára: </span> {{ $csempeMaxPrice }} Ft</p>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <h4><b>Leárazások</b></h4>
            <p><span style="color: black !important; font-weight: 600;">Parketta leárazva: </span>{{ $parkettaOnSale }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Csempék leárazva: </span>{{ $csempeOnSale }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Összes leárazott termék: </span>{{ $sumSale }} db</p>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-8 col-md-8 col-lg-8 offset-sm-4 offset-md-4 offset-lg-4">
            <h4><b>Statisztikák két dátum között</b></h4>
            <p><span style="color: black !important; font-weight: 600;">Rendelések két dátum között: </span>{{ $ordersCountBetweenDates }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Parketta rendelések két dátum között: </span>{{ $parkettaOrdersCountBetweenDates }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Csempe rendelések két dátum között: </span>{{ $csempeOrdersCountBetweenDates }} db</p>
            <p><span style="color: black !important; font-weight: 600;">Bevételek parkettából két dátum között: </span>{{ $parkettaSumBetweenDates }} Ft</p>
            <p><span style="color: black !important; font-weight: 600;">Bevételek csempéből két dátum között: </span>{{ $csempeSumBetweenDates }} Ft</p>
            <p><span style="color: black !important; font-weight: 600;">Bevételek összesen két dátum között: </span>{{ $ordersSumBetweenDates }} Ft</p>
        </div>
    </div>
    <button class="btn btn-dark logout-btn admin m-auto d-block"><a class="admin" href={{ url('dashboard/worker/stats/download') }}><i
                class="fa fa-download"> Letöltés</i></a></button>
</div>
@include('footer')
