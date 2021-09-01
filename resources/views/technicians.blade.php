@include('header')
    @foreach ($techs as $tech)
        <p>{{ $tech->name }}</p>
        <p>{{ $tech->county }}</p>
    @endforeach
@include('footer')