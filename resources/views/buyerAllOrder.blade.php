@include('header')
<div class="container">
    <div class="row">
        @foreach($orders as $order)
            <div class="col-3 mb-5">
            <p>{{ $order->order_number }}</p>
            <p>{{ $order->created_at }}</p>
            <p>{{ $order->buyer_name }}</p>
            <p>{{ $order->email }}</p>
            <p>{{ $order->tel }}</p>
            <p>{{ $order->delivery_zip }}</p>
            <p>{{ $order->delivery_city }}</p>
            <p>{{ $order->delivery_address }}</p>
            <p>{{ $order->gross_sum }}</p>
            <p>{{ $order->net_sum }}</p>
            <p>{{ $order->quantity }}</p>
            <p>{{ $order->product_name }}</p>
            <p>{{ $order->color }}</p>
            </div>
        @endforeach
    </div>
</div>
@include('footer')
