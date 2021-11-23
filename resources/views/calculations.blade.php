@include('header')
    @foreach($calculations as $calculation)
        <p>{{ $calculation->name }}</p>
        <p>{{ $calculation->color }}</p>
        <p>{{ $calculation->type }}</p>
        <p>{{ $calculation->product_height }}</p>
        <p>{{ $calculation->product_width }}</p>
        <p>{{ $calculation->width }}</p>
        <p>{{ $calculation->length }}</p>
        <p>{{ $calculation->height }}</p>
        <p>{{ $calculation->calculated_price }}</p>
    @endforeach
@include('footer')
