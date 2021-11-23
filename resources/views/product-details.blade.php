@include('header')
<div class="main-content-wrapper d-flex clearfix">
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="breacrumb-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-text">
                                <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                                <span>Termékek</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ URL::asset('images/product-img/pro-big-1.jpg') }}">
                                        <img class="d-block w-100" src="{{ URL::asset('images/product-img/pro-big-1.jpg') }}" alt="First slide">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{ $selectedProduct[0]->gross_price }} Ft</p>
                                <h6>{{ $selectedProduct[0]->name }}</h6>
                            <!-- Avaiable -->
                            @if($selectedProduct[0]->actual_stock >= 1)
                            <p class="avaibility"><i class="fa fa-circle" style="color:green"></i> Készleten</p>
                            @else
                                <p class="avaibility"><i class="fa fa-circle" style="color:red"></i> Nincs készleten</p>
                            @endif
                        </div>

                        <div class="short_overview my-5">
                            <p>{{ $selectedProduct[0]->description }}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post">
                            @csrf
                            <div class="cart-btn d-flex mb-50">
                                <p>Darabszám</p><br>
                                <div class="quantity">
                                    @if($selectedProduct[0]->actual_stock >= 1)
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="{{$selectedProduct[0]->actual_stock}}" onkeydown="return false;" name="mennyiség" value="0">
                                    @else
                                        <input type="number" class="qty-text" value="0" disabled>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Kosárba</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>

<form method="POST" action="{{url()->current()}}">
    @csrf
    <input type="number" placeholder="Szélesség.." name="length">
    <input type="number" placeholder="Hosszúság.." name="width">
    <input type="number" placeholder="Magasság.." name="height">
    <button>Kalkuláció</button>
</form>
<div class="row mb-5 mt-5 mx-2">
@foreach ($sortedProducts as $product)
        <div class="col-4">
            <div class="card">
                <div class="text-center" style="background-color: #ccc">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Similarity: {{ round($product['similarity'] * 100, 1) }}%</h5>
                    <a href={{ url('products/' . $product['type'] . '/' . $product['name'] . '/' . $product['color']) }}><p class="card-text text-muted">{{ $product['name'] }} {{ $product['color'] }} ({{ $product['gross_price'] }} Ft)</p></a>
                </div>
            </div>
        </div>
@endforeach
</div>
@include('footer')
