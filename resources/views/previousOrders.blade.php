@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Előző rendelések</h2></div>

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
                <th scope="col">Rendelés összege (Ft)</th>
                <th scope="col">Állapot</th>
                <th scope="col">Részletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr class="text-center">
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->gross_sum }}</td>
                    <td>@if($order->delivered == 1) Elküldve @else Elküldésre vár @endif</td>
                    <td><a href='{{ url('dashboard/prevorders/' . $order->id) }}'><i class="fa fa-angle-double-right admin-icon"> Részletek</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center control ">Nem található rendelés!</h3>
    @endif
</div>
@include('footer')
