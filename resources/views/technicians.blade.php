@include('header')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                    <span>Szakember kereső</span>
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
                        <h4 class="fw-title">Megye</h4>
                        <div class="fw-color-choose">
                            <select class="selectpicker"  name="county">
                                <option>Összes</option>
                                @foreach($counties as $county)
                                    <option>{{$county}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Város</h4>
                        <div class="fw-color-choose">
                            <select class="selectpicker"  name="city">
                                <option>Összes</option>
                                @foreach($cities as $city)
                                    <option>{{$city}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Foglalkozás</h4>
                        <div class="fw-color-choose">
                            <select class="selectpicker"  name="type">
                                <option>Összes</option>
                                <option value="3">Hidegburkoló</option>
                                <option value="2">Melegburkoló</option>
                                <option value="1">Hidegburkoló,melegburkoló</option>
                            </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <input type="submit" class="btn mt-3 filter-btn" value="Szűrés">
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                            @foreach ($techs as $tech)
                                <p>{{ $tech->name }}</p><br>
                                <p>{{ $tech->county }}</p>
                                @if($tech->type === 1)
                                    <p>Hidegburkoló, Melegburkoló</p>
                                @elseif($tech->type === 2)
                                    <p>Melegburkoló</p>
                                @else
                                    <p>Hidegburkoló</p>
                                @endif
                            @endforeach
                        <div class="row justify-content-center paginator">
                            {{--TODO paginator classre justify-content-center-t rakni, hogy középen legyen--}}
                            {{--{{ $projects->appends(request()->query())->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- Product Shop Section End -->

@include('footer')
