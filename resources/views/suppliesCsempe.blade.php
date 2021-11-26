@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Csempék készleten</h2></div>

<div class="container text-center mt-2 mb-3">
    @if (count($products) >= 1)
        <table class="table table-bordered my-2 m-auto ">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th scope="col">Vonalkód</th>
                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Termék jelenleg raktáron (db)</th>
                <th scope="col">Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="text-center">
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->actual_stock }}</td>
                    <td>
                        <a href="{{ url('dashboard/worker/supplies/edit/' . $product->id) }}"><i class="fa fa-edit admin-icon"></i></a>
                        <a href={{ url('dashboard/worker/supplies/delete/' . $product->id) }}><i class="fa fa-trash admin-icon"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center control">Nem található termék!</h3>
@endif
        <a class="admin-add admin" href={{ url('dashboard/worker/supplies/add') }}> <button class="btn btn-dark mt-2"><i class="fa fa-plus pr-1"> Termék hozzáadása</i></button></a>
</div>
@include('footer')
