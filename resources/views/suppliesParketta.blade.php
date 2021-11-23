@include('header')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-5">
            <p>{{ $product->barcode }}</p>
            <p>{{ $product->name }}</p>
            <p>{{ $product->color }}</p>
            <p>{{ $product->type }}</p>
            <p>{{ $product->actual_stock }}</p>
            </div>
        @endforeach
    </div>
</div>
@include('footer')
