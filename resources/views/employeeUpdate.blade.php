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
    <h3 class="text-center admin-control">Alkalmazott adatainak szerkesztése</h3>
    <form method="post">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id" value={{ $employees->id }}>
        <label class="required">Felhasználónév</label><br>
        <input class="form-control form-control-sm" type="text" name="felhasználónév" id="" value='{{ $employees->username }}' required><br>
        <label class="required">Email</label><br>
        <input class="form-control form-control-sm" type="email" name="email" id="" value='{{ $employees->email }}' required><br>
        <label class="required">Születésnap</label><br>
        <input class="form-control form-control-sm" type="date" name="születésnap" id="" value='{{ $employees->birthday }}' required><br>
        <label class="required">Telefonszám</label><br>
        <input class="form-control form-control-sm" type="tel" name="tel" id="" value='{{ $employees->tel }}' required><br>
        <label class="required">Adószám</label><br>
        <input class="form-control form-control-sm" type="text" name="adószám" id="" value='{{ $employees->tax_num }}' required><br>
        <label class="required">Tajszám</label><br>
        <input class="form-control form-control-sm" type="text" name="tajszám" id="" value='{{ $employees->SSN }}' required><br>
        <label class="required">Bankszámlaszám</label><br>
        <input class="form-control form-control-sm" type="text" name="bankszámlaszám" id="" value='{{ $employees->bank_account_number }}' required><br>
        <label class="required">Jogkör</label><br>
        <input class="form-control form-control-sm" type="text" name="jogkör" id="" value='{{ $employees->role }}' required><br>
        <input class="btn btn-dark my-2" type="submit" value="Frissítés">
    </form>
</div>
@include('footer')
