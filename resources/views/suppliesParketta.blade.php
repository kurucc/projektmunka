@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Parketták készleten</h2></div>

<div class="text-center mt-2 mb-3">
    @if (count($products) >= 1)
        <table class="table table-bordered my-2 m-auto ">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th scope="col">Vonalkód</th>
                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Termék jelenleg raktáron (db)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="text-center">
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->actual_stock }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center control">Nem található termék!</h3>
@endif
@include('footer')
