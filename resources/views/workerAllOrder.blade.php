@include('header')
<div class="container">
    <div class="row">
        @foreach($orders as $order)
            <div class="col-3 mb-5">
                <p>{{ $order->order_number }}</p>
                <p>{{ $order->created_at }}</p>
                <p>{{ $order->email }}</p>
                <p>{{ $order->tel }}</p>
                <p>{{ $order->product_name }}</p>
                <p>{{ $order->color }}</p>
                <p>{{ $order->quantity }}</p>
            </div>
        @endforeach
    </div>
</div>
@include('footer')
