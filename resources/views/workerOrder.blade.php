@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Termék rendelés</h2></div>

<div class="container text-center mt-2 mb-3">
    @if (count($parkettak) >= 1)
        <form action="" method="post">
            @csrf
            <table class="table table-bordered my-2 m-auto mx-2">
                <thead class="thead golder-header">
                <tr class="text-center">
                    <th colspan="4"><h4><b>Parketták</b></h4></th>
                </tr>
                <tr class="text-center">
                    <th scope="col">Termék neve</th>
                    <th scope="col">Termék színe</th>
                    <th scope="col">Darabszám</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($parkettak as $parketta)
                    <tr class="text-center">
                        <input type="hidden" name={{ $parketta->id }}>
                        <td>{{ $parketta->name }}</td>
                        <td>{{ $parketta->color }}</td>
                        <td><input type="text" class="form-control-sm" name="parketta[{{ $parketta->id }}]"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center control">Nem található parketta!</h3>
            @endif
            <input type="submit" name="parkettaRendeles" class="btn btn-dark logout-btn admin mt-2" value="Rendelés">
        </form>
</div>
<br><br>
<div class="container text-center mt-5 mb-3">
    @if (count($csempek) >= 1)
        <form action="" method="post">
            @csrf
            <table class="table table-bordered my-2 m-auto mx-2">
                <thead class="thead golder-header">
                <tr class="text-center">
                    <th colspan="4"><h4><b>Csempék</b></h4></th>
                </tr>
                <tr class="text-center">
                    <th scope="col">Termék neve</th>
                    <th scope="col">Termék színe</th>
                    <th scope="col">Darabszám</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($csempek as $csempe)
                    <tr class="text-center">
                        <input type="hidden" name={{ $csempe->id }}>
                        <td>{{ $csempe->name }}</td>
                        <td>{{ $csempe->color }}</td>
                        <td><input class="form-control-sm" type="text" name="csempe[{{ $csempe->id }}]"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center control">Nem található csempe!</h3>
            @endif
            <input type="submit" name="csempeRendeles" class="btn btn-dark logout-btn admin mt-2 mb-2" value="Rendelés">
        </form>
</div>
@include('footer')
