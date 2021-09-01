@include('header')
    @if (count($buyers) > 0)
    <table>
        <tbody>
            <th>ID</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Születésnap</th>
            <th>Telefonszám</th>
            <th>Név</th>
            <th>Irányítószám</th>
            <th>Cím</th>
            <th>Város</th>
            <th>Számla név</th>
            <th>Számlázási cég</th>
            <th>Számla adószáma</th>
            <th>Számla irányítószám</th>
            <th>Számla város</th>
            <th>Számla cím</th>
            <th>Műveletek</th>
            @foreach ($buyers as $key => $value)
                <tr>
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

                    <td><a href="/dashboard/admin/update/buyer/{{ $value->id }}">Frissítés</a></td>
                    <td><a href="/dashboard/admin/delete/buyer/{{ $value->id }}">Törlés</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3>Nem található vásárló! :(</h3>
    @endif
    <button><a href="/dashboard/admin/create/buyer/">Létrehozás</a></button><br>

    @if (count($employee) > 1)
    <table>
        <tbody>
            <th>ID</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Születésnap</th>
            <th>Telefonszám</th>
            <th>Adószám</th>
            <th>TAJ szám</th>
            <th>Bankszámlaszám</th>
            <th>Hatáskör</th>
            <th>Műveletek</th>
            @foreach ($employee as $key => $value)
                @if ($value->username != 'admin')
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->birthday }}</td>
                        <td>{{ $value->tel }}</td>
                        <td>{{ $value->tax_num }}</td>
                        <td>{{ $value->SSN }}</td>
                        <td>{{ $value->bank_account_number }}</td>
                        <td>{{ $value->role }}</td>

                        <td><a href="/dashboard/admin/update/employee/{{ $value->id }}">Frissítés</a></td>
                        <td><a href="/dashboard/admin/delete/employee/{{ $value->id }}">Törlés</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    @else
    <h3>Nem található alkalmazott! :(</h3>
    @endif
    <button><a href={{ url('dashboard/admin/create/employee') }}>Létrehozás</a></button>
@include('footer')