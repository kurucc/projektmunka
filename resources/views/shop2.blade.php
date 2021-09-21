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
                                    <input type="text" id="maxamount" name="priceTo">
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
                                <div class="price-input">
                                    <input type="text" id="minThick" name="thicknessFrom">
                                    <input type="text" id="maxThick" name="thicknessTo">
                                </div>
                            </div>
                            <div
                                class="price-range thickness ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
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
                                <div class="price-input">
                                    <input type="text" id="minWidth" name="widthFrom">
                                    <input type="text" id="maxWidth" name="widthTo">
                                </div>
                            </div>
                            <div
                                class="price-range width ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
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
                            <select multiple="multiple" name="color[]">
                                @foreach($colors as $color)
                                    <option>{{$color['color']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Akciós</h4>
                        <input type="checkbox" name="sale"><br>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Szűrés</h4>
                        <select name="orderBy">
                            <option value="desc">Csökkenő</option>
                            <option value="asc">Növekvő</option>
                        </select><br>
                        <select name="sortBy">
                            <option value="name">Név szerint</option>
                            <option value="gross_price">Ár szerint</option>
                        </select><br>
                        <input type="text" placeholder="Termékek keresése..." name="searchText">
                        <input type="submit" value="Szűrés">
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
                {{--TODO paginator classre justify-content-center-t rakni, hogy középen legyen--}}
                {{ $projects->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Shop Section End -->

@include('footer')
