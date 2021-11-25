@include('header')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                    <a href="{{ url('/cart') }}"><i class="fa fa-shopping-basket"></i>Kosár</a>
                    <span>Megrendelés</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-2"><h2 class="text-center admin-control">Fizetés</h2></div>

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
        <table class="table table-bordered my-2 m-auto">
            <thead class="thead golder-header">
            <tr class="text-center">
                <th colspan="10"><h4><b>Rendelő adatai</b></h4></th>
            </tr>
            <tr class="text-center">

                <th scope="col">Név</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefonszám</th>
                <th scope="col">Szállítási cím</th>
            </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{ Auth::guard('buyer')->user()->name }}</td>
                    <td>{{ Auth::guard('buyer')->user()->email }}</td>
                    <td>{{ Auth::guard('buyer')->user()->tel }}</td>
                    <td>{{ Auth::guard('buyer')->user()->delivery_zip . ' ' . Auth::guard('buyer')->user()->delivery_city . ', ' .
                         Auth::guard('buyer')->user()->delivery_address }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered my-2
        mt-5">
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
                </tr>

            @endforeach
            </tbody>
        </table>

        <table class="table table-bordered my-2
        mt-5">
            <thead class="thead" style="background: #0c5460; color:white">
            <tr class="text-center">
                <th colspan="10"><h4 style="color:white"><b>Összesen</b></h4></th>
            </tr>
            <tr class="text-center">

                <th scope="col">Darabszám (db)</th>
                <th scope="col">Fizetendő (Ft)</th>

            </tr>
            </thead>
            <tbody>
            <tr class="text-center">
                <td>{{ Cart::getTotalQuantity() }}</td>
                <td>{{ Cart::getTotal() }}</td>
            </tr>
            </tbody>
        </table>
        <form action="" method="POST">
            @csrf
            <input type="submit" name="order" class="btn btn-dark admin mt-2" value="Megrendelés">
        </form>
</div>
@include('footer')
