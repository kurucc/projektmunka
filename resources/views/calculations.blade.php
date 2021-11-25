@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Kalkulációk</h2></div>

<div class="container text-center mt-2 mb-3">
    @if (count($calculations) >= 1)
        <table class="table table-bordered my-2 m-auto">
            <thead class="thead golder-header">
            <tr class="text-center">

                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Termék típusa</th>
                <th scope="col">Termék magassága (cm)</th>
                <th scope="col">Termék szélessége (cm)</th>
                <th scope="col">Megadott szélesség (cm)</th>
                <th scope="col">Megadott hosszúság (cm)</th>
                <th scope="col">Megadott magasság (cm)</th>
                <th scope="col">Kalkulált ár (Ft)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($calculations as $calculation)
                <tr class="text-center">
                    <td>{{ $calculation->name }}</td>
                    <td>{{ $calculation->color }}</td>
                    <td>{{ $calculation->type }}</td>
                    <td>{{ $calculation->product_height }}</td>
                    <td>{{ $calculation->product_width }}</td>
                    <td>{{ $calculation->width }}</td>
                    <td>{{ $calculation->length }}</td>
                    <td>{{ $calculation->height }}</td>
                    <td>{{ $calculation->calculated_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center control ">Nem található kalkuláció!</h3>
    @endif
</div>
@include('footer')
