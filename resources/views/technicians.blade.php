@include('header')

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
                        <div class="card mb-3">
                            <h5 class="card-header text-center">{{ $tech->name }}</h5>
                            <div class="card-body">
                                <h6 class="card-text"><b>Telefonszám:</b> {{ $tech->tel }}</h6>
                                <h6 class="card-text"><b>E-mail cím:</b> {{ $tech->email }}</h6>
                                <h6 class="card-text"><b>Weboldal:</b>
                                    @if($tech->webpage)
                                        {{ $tech->webpage }}
                                    @else
                                        -
                                    @endif
                                </h6>
                                <h6 class="card-text"><b>Megye:</b> {{ $tech->county }}</h6>
                                <h6 class="card-text"><b>Cím:</b> {{$tech->zip_code . ' ' .$tech->city_name . ', ' . $tech->address }}</h6>
                                <h6 class="card-text"><b>Foglalkozás:</b>
                                    @if($tech->type === 1)
                                        Hidegburkoló, Melegburkoló
                                    @elseif($tech->type === 2)
                                        Melegburkoló
                                    @else
                                        Hidegburkoló
                                    @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="row justify-content-center paginator">
                            {{ $techs->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@include('footer')
