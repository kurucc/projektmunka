@include('header')
<div class="container main-content-wrapper clearfix">
    <div class="row">

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                            <a href="{{ url('/products/' .  $selectedProduct[0]->type) }}"><i
                                    class=""></i>{{$selectedProduct[0]->type}}</a>
                            <span>{{ $selectedProduct[0]->name }} / {{ $selectedProduct[0]->color }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Termék</h1>
    <div class="row mt-3">
        <div class="col-12 col-lg-4">
            <img class="img-fluid"
                 src="{{ URL::asset('storage/' . $selectedProduct[0]->picture_path) }}"
                 width="300px" height="300px">
        </div>
        <div class="col-12 col-lg-4">
            <div class="single_product_desc">
                <!-- Product Meta Data -->
                <div class="product-meta-data">
                    <div class="line"></div>
                    <h2>{{ $selectedProduct[0]->name }}</h2>
                    @if($selectedProduct[0]->actual_stock >= 1)
                        <p class="avaibility"><i class="fa fa-circle" style="color:green"></i> Készleten</p>
                    @else
                        <p class="avaibility"><i class="fa fa-circle" style="color:red"></i> Nincs készleten
                        </p>
                    @endif
                </div>
                <h4>Ár</h4>
                <div class="product-price">
                    {{$selectedProduct[0]->gross_price - ($selectedProduct[0]->gross_price * $selectedProduct[0]->sale/100) }} Ft
                    @if(!empty($selectedProduct[0]->sale))
                        <span class="crossed">{{$selectedProduct[0]->gross_price}} Ft</span>
                    @endif
                </div>
                <div class="short_overview my-5">
                    <h4>Termékleírás</h4>
                    <p>{{ $selectedProduct[0]->description }}</p>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-4">
            <h4>Specifikációk</h4>
            <ul>
                <li>Szélesség: {{ $selectedProduct[0]->width }} cm</li>
                <li>Vastagság: {{ $selectedProduct[0]->thickness }} cm</li>
                <li>Hosszúság: {{ $selectedProduct[0]->height }} cm</li>
            </ul>
            <br>
            <h4>Rendelés</h4>
            <form class="cart clearfix" method="post">
                @csrf
                <div class="cart-btn mb-1">
                    <label>Darabszám</label>
                    <div class="quantity">
                        @if($selectedProduct[0]->actual_stock >= 1)
                            <input type="number" class="qty-text form-control-sm" id="qty" step="1" min="1"
                                   max="{{$selectedProduct[0]->actual_stock}}"
                                   name="mennyiség" value="1" required>
                        @else
                            <input type="number" class="qty-text form-control-sm" value="0" disabled>
                        @endif
                    </div>
                </div>
                @if($selectedProduct[0]->actual_stock >= 1)
                    <button type="submit" name="addtocart" class="btn btn-dark admin">Kosárba</button>
                @endif
            </form>
        </div>
    </div>


    <h2>Kalkuláció</h2>
    <form method="POST" action="{{url()->current()}}">
        <div class="row">
            @csrf
            <div class="col-12 col-lg-4">
                <label>Szélesség (cm)</label><br>
                <input type="number" class="form-control-sm" placeholder="Szélesség" name="length" required min="1"
                       value="1">
            </div>
            <div class="col-12 col-lg-4">
                <label>Hosszúság (cm)</label><br>
                <input type="number" class="form-control-sm" placeholder="Hosszúság" name="width" required min="1"
                       value="1">
            </div>
            <div class="col-12 col-lg-4">
                <label>Magasság (cm)</label><br>
                <input type="number" class="form-control-sm" placeholder="Magasság" name="height" min="1">
                <button class="btn btn-dark admin ml-5">Kalkulálás</button>
            </div>
        </div>
    </form>


<h2>Kapcsolódó termékek</h2>
<div class="row mt-2 mb-2 mx-2">
    @foreach ($sortedProducts as $product)
        <div class="col-lg-4 col-12">
            <a href={{ url('products/' . $product['type'] . '/' . $product['name'] . '/' . $product['color']) }}>
            <div class="card">
                <div class="text-center" style="background-color: #ccc">
                        <h4 class="card-text text-capitalize">{{ $product['name'] }} / {{ $product['color'] }}</h4>
                </div>
                <div class="card-body text-center">
                    <img class="img-fluid"
                         src="{{ URL::asset('storage/' . $product['picture_path']) }}"
                         width="200px" height="200px">
                </div>
            </div>
            </a>
        </div>
    @endforeach
</div>
</div>
</div>
@include('footer')
