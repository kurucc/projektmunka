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
    <form method="post">
        @csrf
        <label>Felhasználónév</label><br>
        <input type="text" name="felhasználónév" id="" required><br>
        <label>Jelszó</label><br>
        <input type="password" name="jelszó" id="" required><br>
        <label>Email</label><br>
        <input type="email" name="email" id=""><br>
        <label>Születésnap</label><br>
        <input type="date" name="születésnap" id=""><br>
        <label>Telefonszám</label><br>
        <input type="tel" name="tel" id=""><br>
        <label>Név</label><br>
        <input type="text" name="név" id=""><br>
        <label>Irányítószám</label><br>
        <input type="text" name="delivery_zip" id=""><br>
        <label>Cím</label><br>
        <input type="text" name="delivery_address" id=""><br>
        <label>Város</label><br>
        <input type="text" name="delivery_city" id=""><br>
        <label>Számlázási név</label><br>
        <input type="text" name="invoice_name" id=""><br>
        <label>Cég név</label><br>
        <input type="text" name="invoice_company" id=""><br>
        <label>Adószám</label><br>
        <input type="text" name="invoice_tax" id=""><br>
        <label>Számlázási irányítószám</label><br>
        <input type="text" name="invoice_zip" id=""><br>
        <label>Számlázási város</label><br>
        <input type="text" name="invoice_city" id=""><br>
        <label>Számlázási cím</label><br>
        <input type="text" name="invoice_address" id=""><br>
        <input type="submit" value="Létrehozás">
    </form>
@include('footer')