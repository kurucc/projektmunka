@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Dolgozói rendelések</h2></div>

<div class="container text-center mt-2 mb-3">
    @if (count($orders) >= 1)
        <table class="table table-bordered my-2 m-auto">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th colspan="10"><h4><b>Rendelések</b></h4></th>
            </tr>
            <tr class="text-center">

                <th scope="col">Rendelés szám</th>
                <th scope="col">Rendelés ideje</th>
                <th scope="col">Email</th>
                <th scope="col">Telefonszám</th>
                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Darabszám</th>
                <th scope="col">Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr class="text-center">
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->tel }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->color }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td><a class="" href="{{url('dashboard/worker/orders/workers/' . $order->order_number)}}"><i
                                class="fa-check fa admin-icon">Átvéve</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center control ">Nem található rendelés!</h3>
@endif
</div>
@include('footer')
