@include('header')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                    <span>Kosár</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-2"><h2 class="text-center admin-control">Kosár</h2></div>

<div class="container text-center mt-2 mb-3">
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
    @if (count($items) >= 1)
        <table class="table table-bordered my-2 m-auto">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th colspan="10"><h4><b>Tételek</b></h4></th>
            </tr>
            <tr class="text-center">

                <th scope="col">Termék neve</th>
                <th scope="col">Termék színe</th>
                <th scope="col">Darabszám (db)</th>
                <th scope="col">Nettó összeg (Ft)</th>
                <th scope="col">Bruttó összeg (Ft)</th>
                <th scope="col">Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $row)
                <tr class="text-center">
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->associatedModel->color }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ ($row->price/1.27) * $row->quantity }}</td>
                    <td>{{ ($row->price) * $row->quantity }}</td>
                    <td>
                        <a href={{ url('cart/minus/' . $row->id) }}><i class="fa fa-minus admin-icon"></i></a>
                        <a href={{ url('cart/add/' . $row->id) }}><i class="fa fa-plus admin-icon"></i></a>
                        <a href={{ url('cart/remove/' . $row->id) }}><i class="fa fa-trash admin-icon"></i></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <a href="{{ url('cart/order') }}"><button class="btn btn-dark admin mt-2">Fizetés</button></a>
    @else
        <h3 class="text-center control ">Üres a kosár!</h3>
    @endif
</div>
@include('footer')
