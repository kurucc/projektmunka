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
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('img/product-img/pro-big-1.jpg');">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url('img/product-img/pro-big-2.jpg');">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url('img/product-img/pro-big-3.jpg');">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url('img/product-img/pro-big-4.jpg');">
                                </li>
                            </ol>
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
                            <p class="avaibility"><i class="fa fa-circle"></i> Készleten</p>
                            @else
                                <p class="avaibility"><i class="fa fa-circle"></i> Nincs készleten</p>
                            @endif
                        </div>

                        <div class="short_overview my-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post">
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
@include('footer')
