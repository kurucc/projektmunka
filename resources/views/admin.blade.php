@include('header')
<div class="container my-2"><h2 class="text-center admin-control">Admin felület</h2></div>

@if (count($buyers) > 0)

    <table class="table table-bordered w-75 my-2 m-auto ">
        <thead class="thead golder-header">
        <tr class="text-center">
            <th colspan="16"><h4><b>Vásárlók</b></h4></th>
        </tr>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Felhasználónév</th>
            <th scope="col">Email</th>
            <th scope="col">Születésnap</th>
            <th scope="col">Telefonszám</th>
            <th scope="col">Név</th>
            <th scope="col">Irányítószám</th>
            <th scope="col">Cím</th>
            <th scope="col">Város</th>
            <th scope="col">Számla név</th>
            <th scope="col">Számlázási cég</th>
            <th scope="col">Számla adószáma</th>
            <th scope="col">Számla irányítószám</th>
            <th scope="col">Számla város</th>
            <th scope="col">Számla cím</th>
            <th scope="col">Műveletek</th>

        </thead>
        <tbody>
        @foreach ($buyers as $key => $value)

            <tr class="text-center">
                <td>{{ $value->id }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->birthday }}</td>
                <td>{{ $value->tel }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->delivery_zip }}</td>
                <td>{{ $value->delivery_address }}</td>
                <td>{{ $value->delivery_city }}</td>
                <td>{{ $value->invoice_name }}</td>
                <td>{{ $value->invoice_company }}</td>
                <td>{{ $value->invoice_tax }}</td>
                <td>{{ $value->invoice_zip }}</td>
                <td>{{ $value->invoice_city }}</td>
                <td>{{ $value->invoice_address }}</td>

                <td><a href="/dashboard/admin/update/buyer/{{ $value->id }}">
                        <i class="fa fa-edit admin-icon"></i>
                    </a>
                    <a href="/dashboard/admin/delete/buyer/{{ $value->id }}"><i class="fa fa-trash admin-icon"></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <div class="container text-center mt-2 mb-3">
    <h3 class="text-center control">Nem található vásárló! :(</h3>
    </div>
@endif
<div class="container text-center mt-2 mb-3">
    <button class="btn btn-dark"><a class="admin-add admin" href="/dashboard/admin/create/buyer/"> <i class="fa fa-plus pr-1"></i> Létrehozás</a></button>
    <br></div>

<div class="container text-center mt-2 mb-3">
@if (count($employee) > 1)
    <table class="table table-bordered my-2 m-auto ">
        <thead class="thead golder-header">
        <tr class="text-center">
            <th colspan="10"><h4><b>Dolgozók</b></h4></th>
        </tr>
        <tr class="text-center">

            <th scope="col">ID</th>
            <th scope="col">Felhasználónév</th>
            <th scope="col">Email</th>
            <th scope="col">Születésnap</th>
            <th scope="col">Telefonszám</th>
            <th scope="col">Adószám</th>
            <th scope="col">TAJ szám</th>
            <th scope="col">Bankszámlaszám</th>
            <th scope="col">Hatáskör</th>
            <th scope="col">Műveletek</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employee as $key => $value)
            @if ($value->username != 'admin')
                <tr class="text-center">
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->birthday }}</td>
                    <td>{{ $value->tel }}</td>
                    <td>{{ $value->tax_num }}</td>
                    <td>{{ $value->SSN }}</td>
                    <td>{{ $value->bank_account_number }}</td>
                    <td>{{ $value->role }}</td>

                    <td><a href="/dashboard/admin/update/employee/{{ $value->id }}"> <i
                                class="fa fa-edit admin-icon"></i></a>
                        <a href="/dashboard/admin/delete/employee/{{ $value->id }}"><i
                                class="fa fa-trash admin-icon"></i></a></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@else
    <h3 class="text-center control">Nem található alkalmazott! :(</h3>
@endif


    <button class="btn btn-dark mt-2"><a class="admin-add admin" href={{ url('dashboard/admin/create/employee') }}> <i class="fa fa-plus pr-1"></i>Létrehozás</a></button>
    <br></div>

@include('footer')
