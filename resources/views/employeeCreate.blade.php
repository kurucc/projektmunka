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
        <input type="hidden" name="id">
        <label>Felhasználónév</label><br>
        <input type="text" name="felhasználónév" id=""><br>
        <label>Jelszó</label><br>
        <input type="password" name="jelszó" id="" placeholder="Jelszó..."><br>
        <label>Email</label><br>
        <input type="email" name="email" id="" ><br>
        <label>Születésnap</label><br>
        <input type="date" name="születésnap" id="" ><br>
        <label>Telefonszám</label><br>
        <input type="tel" name="tel" id=""><br>
        <label>Adószám</label><br>
        <input type="text" name="adószám" id="" ><br>
        <label>Tajszám</label><br>
        <input type="text" name="tajszám" id=""><br>
        <label>Bankszámlaszám</label><br>
        <input type="text" name="bankszámlaszám" id=""><br>
        <label>Jogkör</label><br>
        <input type="text" name="jogkör" id=""><br>
        <input type="submit" value="Létrehozás">
    </form>
@include('footer')