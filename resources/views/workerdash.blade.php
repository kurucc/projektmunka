@include('header')
    <form action={{ url('/dashboard/worker/stats') }} method="get">
        <input type="date" name="dateFrom" value={{ $from }}>
        <input type="date" name="dateTo" value= {{ $to }}>
        <input type="submit" value="Beállít">
    </form>
    <p>Csempe készlet: {{ $csempeCount }} db</p>
    <p>Parketta készlet: {{ $parkettaCount }} db</p>
    <p>Összes készlet: {{ $sumCount }} db</p>
    <p>A parketták maximális ára: {{ $parkettaMaxPrice }} Ft</p>
    <p>A csempék maximális ára: {{ $csempeMaxPrice }} Ft</p>
    <p>Parketta leárazva: {{ $parkettaOnSale }} db</p>
    <p>Csempék leárazva: {{ $csempeOnSale }} db</p>
    <p>Összes leárazott termék: {{ $sumSale }} db</p>
    <p>Rendelések két dátum között (query paraméteres): {{ $ordersCountBetweenDates }} db</p>
    <p>Parketta rendelések két dátum között (query paraméteres) {{ $parkettaOrdersCountBetweenDates }} db</p>
    <p>Csempe rendelések két dátum között (query paraméteres) {{ $csempeOrdersCountBetweenDates }} db</p>
    <p>Bevételek parkettából két dátum között (query paraméteres) {{ $parkettaSumBetweenDates }} Ft</p>
    <p>Bevételek csempéből két dátum között (query paraméteres) {{ $csempeSumBetweenDates }} Ft</p>
    <p>Bevételek összesen két dátum között {{ $ordersSumBetweenDates }} Ft</p>
    <button><a href={{ url('dashboard/worker/stats/download') }}>Letöltés</a></button>
@include('footer')