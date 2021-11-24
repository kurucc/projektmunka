@include('header')

@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Hoppá! Valami hiba történt!</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container my-2">
    <h3 class="text-center admin-control">Vásárló adatainak szerkesztése</h3>
    <form method="post">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id" value={{ $buyers->id }}>
        <label class="required">Felhasználónév</label><br>
        <input class="form-control form-control-sm" type="text" name="felhasználónév" id="" value='{{ $buyers->username }}' required>
        <label class="required">Email</label><br>
        <input class="form-control form-control-sm" type="email" name="email" id="" value='{{ $buyers->email }}' required>
        <label class="required">Születésnap</label><br>
        <input class="form-control form-control-sm" type="date" name="születésnap" id="" value='{{ $buyers->birthday }}' required>
        <label>Telefonszám</label><br>
        <input class="form-control form-control-sm" type="tel" name="tel" id="" value='{{ $buyers->tel }}'>
        <label class="required">Név</label><br>
        <input class="form-control form-control-sm" type="text" name="név" id="" value='{{ $buyers->name }}' required>
        <label class="required">Szállítási irányítószám</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_zip" id="" value='{{ $buyers->delivery_zip }}' required>
        <label class="required">Szállítási cím</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_address" id="" value='{{ $buyers->delivery_address }}' required>
        <label class="required">Szállítási település</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_city" id="" value='{{ $buyers->delivery_city }}' required>
        <label>Számlázási név</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_name" id="" value='{{ $buyers->invoice_name }}'>
        <label>Számlázási cég</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_company" id="" value='{{ $buyers->invoice_company }}'>
        <label>Számlázási adószám</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_tax" id="" value='{{ $buyers->invoice_tax }}'>
        <label class="required">Számlázási irányítószám</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_zip" id="" value='{{ $buyers->invoice_zip }}' required>
        <label class="required">Számlázási település</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_city" id="" value='{{ $buyers->invoice_city }}' required>
        <label class="required">Számlázási cím</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_address" id="" value='{{ $buyers->invoice_address }}' required>
        <input class="btn btn-dark my-2"  type="submit" value="Frissítés">
    </form>
</div>
@include('footer')
