@include('header')
    @foreach ($items as $item)
        @if (empty($item->sale))
            <p>{{ $item->name }} - {{ $item->color }} - {{ $item->quantity }}db {{ $item->gross_price * $item->quantity}}Ft</p>
        @else
            <p>{{ $item->name }} - {{ $item->color }} - {{ $item->quantity }}db {{ ($item->gross_price * $item->quantity) * (1.00 - ($item->sale/100))}}Ft</p>
        @endif
    @endforeach
@include('footer')