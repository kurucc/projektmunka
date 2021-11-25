@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Előző rendelés</h2></div>

<div class="container text-center mt-2 mb-3">
        <table class="table table-bordered my-2 m-auto">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Rendelés darabszáma (db)</th>
                <th scope="col">Rendelés összege (Ft)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr class="text-center">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->gross_price * $item->quantity }}</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

</div>
@include('footer')
