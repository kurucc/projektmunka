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
    <h3 class="text-center admin-control">Alkalmazott létrehozása</h3>
    <form method="post">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id">
        <label class="required">Felhasználónév</label><br>
        <input class="form-control form-control-sm" type="text" name="felhasználónév" id="" placeholder="Felhasználónév" required><br>
        <label class="required">Jelszó</label><br>
        <input class="form-control form-control-sm" type="text" name="jelszó" id="" placeholder="Jelszó" required><br>
        <label class="required">Email</label><br>
        <input class="form-control form-control-sm" type="email" name="email" id="" placeholder="Email" required><br>
        <label class="required">Születésnap</label><br>
        <input class="form-control form-control-sm" type="date" name="születésnap" id="" placeholder="Születésnap" required><br>
        <label class="required">Telefonszám</label><br>
        <input class="form-control form-control-sm" type="tel" name="tel" id="" placeholder="Telefonszám" required><br>
        <label class="required">Adószám</label><br>
        <input class="form-control form-control-sm" type="text" name="adószám" id="" placeholder="Adószám" required><br>
        <label class="required">Tajszám</label><br>
        <input class="form-control form-control-sm" type="text" name="tajszám" id="" placeholder="Tajszám" required><br>
        <label class="required">Bankszámlaszám</label><br>
        <input class="form-control form-control-sm" type="text" name="bankszámlaszám" id="" placeholder="Bankszámlaszám" required><br>
        <label class="required">Jogkör</label><br>
        <input class="form-control form-control-sm" type="text" name="jogkör" id="" placeholder="Jogkör" required><br>
        <input class="btn btn-dark my-2" type="submit" value="Létrehozás">
    </form>
</div>
@include('footer')
