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
    <h3 class="text-center admin-control">Vásárló létrehozása</h3>
    <form method="post">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id">
        <label class="required">Felhasználónév</label><br>
        <input class="form-control form-control-sm" type="text" name="felhasználónév" id="" placeholder="Felhasználónév" required>
        <label class="required">Jelszó</label><br>
        <input class="form-control form-control-sm" type="password" name="jelszó" id="" placeholder="Jelszó" required>
        <label class="required">Email</label><br>
        <input class="form-control form-control-sm" type="email" name="email" id="" placeholder="Email" required>
        <label class="required">Születésnap</label><br>
        <input class="form-control form-control-sm" type="date" name="születésnap" id="" placeholder="Születésnap"  required>
        <label>Telefonszám</label><br>
        <input class="form-control form-control-sm" type="tel" name="tel" id="" placeholder="Telefonszám">
        <label class="required">Név</label><br>
        <input class="form-control form-control-sm" type="text" name="név" id="" placeholder="Név" required>
        <label class="required">Szállítási irányítószám</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_zip" id="" placeholder="Irányítószám"  required>
        <label class="required">Szállítási cím</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_address" id="" placeholder="Cím" required>
        <label class="required">Szállítási település</label><br>
        <input class="form-control form-control-sm" type="text" name="delivery_city" id="" placeholder="Település" required>
        <label>Számlázási név</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_name" placeholder="Név" id="" >
        <label>Számlázási cég</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_company" id="" placeholder="Cég">
        <label>Számlázási adószám</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_tax" id="" placeholder="Adószám">
        <label class="required">Számlázási irányítószám</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_zip" id="" placeholder="Irányítószám" required>
        <label class="required">Számlázási település</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_city" id="" placeholder="Település" required>
        <label class="required">Számlázási cím</label><br>
        <input class="form-control form-control-sm" type="text" name="invoice_address" id="" placeholder="Cím" required>
        <input class="btn btn-dark my-2"  type="submit" value="Létrehozás">
    </form>
</div>
@include('footer')
