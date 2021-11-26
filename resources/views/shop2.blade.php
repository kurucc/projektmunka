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
        <form method="GET" action="{{ url()->current() }}">
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
                            <select class="selectpicker" multiple="multiple" name="color[]">
                                @foreach($colors as $color)
                                    <option>{{$color['color']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter-widget sale align-items-center">
                        <div class="fw-title"> <h4 class="sale-h4">Akciós <input type="checkbox" name="sale"></h4 >  </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Szűrés</h4>
                        <select class="selectpicker" name="sortBy">
                            <option value="name_asc" selected>Név szerint növekvő</option>
                            <option value="name_desc">Név szerint csökkenő</option>
                            <option value="gross_price_asc">Ár szerint növekvő</option>
                            <option value="gross_price_desc">Ár szerint csökkenő</option>
                        </select><br><br>
                        <input type="text" class="form-control" placeholder="Termékek keresése..." name="searchText">
                        <input type="submit" class="btn mt-3 filter-btn" value="Szűrés">
                    </div>
                </div>
        <div class="col-lg-9 order-1 order-lg-2">
            <div class="product-list">
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic" style="width: fit-content">
                                    <a href="{{ url('products/' . $project->type . '/' . $project->name . '/' . $project->color) }}"><img src="{{ URL::asset('storage/' . $project->picture_path) }}" width="150px" height="150px"></a>
                                    @if(!empty($project->sale))
                                        <div class="sale pp-sale">Leárazás - {{ $project->sale . '%'}}</div>
                                    @endif
                                </div>
                                <div class="pi-text">
                                    <a href="{{ url('products/' . $project->type . '/' . $project->name . '/' . $project->color) }}">
                                        <h4 class="text-capitalize">{{$project->name}}</h4>
                                    </a>
                                    <div class="product-price">
                                        {{ $project->gross_price - ($project->gross_price * $project->sale/100) }} Ft
                                        @if(!empty($project->sale))
                                            <span class="crossed">{{ $project->gross_price }} Ft</span>
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
        </form>
    </div>
</section>
<!-- Product Shop Section End -->

@include('footer')
