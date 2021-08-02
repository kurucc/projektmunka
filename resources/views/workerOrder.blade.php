@include('header')
<form action="" method="post">
    @csrf
    <h1>Parketták</h1>
    @foreach ($parkettak as $parketta)
        <input type="hidden" name={{ $parketta->id }}>
        <a href={{ url('products/parketta') . '/' . $parketta->name . '/' . $parketta->color}}>{{ $parketta->name }}, {{ $parketta->color }}</a> <input type="text" name="parketta[{{ $parketta->id }}]"><br>
    @endforeach
    <input type="submit" name="parkettaRendeles" value="Rendelés">
</form>

<form action="" method="post">
    @csrf
    <h1>Csempék</h1>
    @foreach ($csempek as $csempe)
    <input type="hidden" name={{ $csempe->id }}>
        <a href={{ url('products/csempe') . '/' . $csempe->name . '/' . $csempe->color}}>{{ $csempe->name }}, {{ $csempe->color }}</a> <input type="text" name="csempe[{{ $csempe->id }}]"><br>
    @endforeach
    <input type="submit" name="csempeRendeles" value="Rendelés">
</form>
@include('footer')