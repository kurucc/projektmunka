@include('header')
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p><strong>Juhé, siker!</strong></p>
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <p><strong>Hoppá...</strong></p>
                <p>{!! \Session::get('error') !!}</p>
            </div>
        @endif
    @if (count($items) < 1)
        <h1>Üres a kosár! :(</h1>
    @else
        @foreach($items as $row)
            {{ $row->name }}
            {{ $row->associatedModel->color }}
            <a href={{ url('cart/add/' . $row->id) }}>+</a> {{ $row->quantity }} <a href={{ url('cart/minus/' . $row->id) }}>-</a>
            Nettó: {{ ($row->price/1.27) * $row->quantity }}
            Bruttó: {{ ($row->price) * $row->quantity }}
            <a href={{ url('cart/remove/' . $row->id) }}>Eltávolítás</a> <br>
        @endforeach
        <form action="" method="POST">
            @csrf
            <input type="submit" name="order" value="Megrendelés">
        </form>
    @endif
@include('footer')