@include('header')
    @foreach ($orders as $order)
        <a href={{ url('dashboard/prevorders/' . $order->id) }}><p>Order number: {{ $order->order_number }} - Order gross: {{ $order->gross_sum }} - Order time: {{ $order->created_at }}</p></a>
    @endforeach
@include('footer')