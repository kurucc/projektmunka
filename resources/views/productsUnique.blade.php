@include('header')
    <style>
        .large-product-image {
            width: auto;
            height: 200px;
        }
    </style>
    <div class="container">
        <div class="row mb-4" style="border-bottom: 1px solid #ccc">
            <div class="col col-lg-4 text-center">
                @foreach ($products as $product)
                <a href="/?id={{ $product['id'] }}" style="text-decoration: none;"></a>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="offset-3 col-6">
                <h5>Selected Product</h5>
            </div>
        </div>
        <div class="row mb-5">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="text-center" style="background-color: #ccc">
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted">{{ $selectedProduct[0]->name }} {{ $selectedProduct[0]->color }} ({{ $selectedProduct[0]->gross_price }})Ft</p>
                    </div>
                    <form method="POST">
                        @csrf
                        <input type="text" name="mennyiség" id="" placeholder="Mennyiség">
                        <input type="submit" value="Kosárba">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-3 col-6">
                <h5>Similar Products</h5>
            </div>
        </div>
        @foreach ($products as $product)
        <div class="row mb-5">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="text-center" style="background-color: #ccc">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Similarity: {{ round($product['similarity'] * 100, 1) }}%</h5>
                        <a href={{ url('products/' . $product['type'] . '/' . $product['name'] . '/' . $product['color']) }}><p class="card-text text-muted">{{ $product['name'] }} {{ $product['color'] }} (${{ $product['gross_price'] }})</p></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@include('footer')
