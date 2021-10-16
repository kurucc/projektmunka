@include('header')

<!-- Breadcrumb Section Begin -->
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
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <form>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Ár</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">

                                    <input type="text" id="minamount" name="priceFrom">
                                   <input type="text" id="maxamount" name="priceTo"> <label>Ft</label>
                                </div>
                            </div>
                            <div
                                class="price-range price ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="{{$priceMin}}"
                                data-max="{{$priceMax}}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>

                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Vastagság</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="thick-width-input">
                                    <input type="text" id="minThick" name="thicknessFrom">
                                    <input type="text" id="maxThick" name="thicknessTo"> <label>mm</label>
                                </div>
                            </div>
                            <div
                                class="thick-width-range thickness ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-thickmin="{{$thicknessMin}}"
                                data-thickmax="{{$thicknessMax}}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Szélesség</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="thick-width-input">
                                    <input type="text" id="minWidth" name="widthFrom">
                                    <input type="text" id="maxWidth" name="widthTo"> <label>mm</label>
                                </div>
                            </div>
                            <div
                                class="thick-width-range width ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-minwidth="{{$widthMin}}"
                                data-maxwidth="{{$widthMax}}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Szín</h4>
                        <div class="fw-color-choose">
                                @foreach($colors as $color)
                                    <input type="checkbox" name={{$color['color']}}/> <label style="margin-bottom: 5px">{{$color['color']}} </label>
                                @endforeach
                        </div>
                    </div>
                    <div class="filter-widget sale align-items-center">
                        <div class="fw-title"> <h4 class="sale-h4">Akciós <input type="checkbox" name="sale"></h4 >  </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Szűrés</h4>
                        <select class="form-control" name="sortBy">
                            <option value="name_asc" selected>Név szerint növekvő (A-Z)</option>
                            <option value="name_desc">Név szerint csökkenő (Z-A)</option>
                            <option value="gross_price_asc">Ár szerint növekvő</option>
                            <option value="gross_price_desc">Ár szerint csökkenő</option>
                        </select><br>
                        <input type="text" class="form-control" placeholder="Termékek keresése..." name="searchText">
                        <button type="submit" class="btn mt-3 filter-btn" id="filter">Szűrés</button>
                    </div>
                </div>
        </form>
        <div class="col-lg-9 order-1 order-lg-2">
            <div class="product-list">
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset('img/products/product-1.jpg') }}" alt="">
                                    @if(!empty($project->sale))
                                        <div class="sale pp-sale">Leárazás - {{ $project->sale . '%'}}</div>
                                    @endif
                                    <ul>
                                        {{--TODO cart-ba rakás megcsinálása vagy kivétele--}}
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="{{ url('products/' . $project->type . '/' . $project->name . '/' . $project->color) }}">+ Megnézem</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="#">
                                        <h5></h5>
                                    </a>
                                    <div class="product-price">
                                        {{ $project->gross_price }} Ft
                                        @if(!empty($project->sale))
                                            <span>{{ $project->gross_price + ($project->gross_price * $project->sale/100)  }} Ft</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center paginator">
                {{--TODO paginator classre justify-content-center-t rakni, hogy középen legyen--}}
                {{ $projects->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Shop Section End -->

@include('footer')
