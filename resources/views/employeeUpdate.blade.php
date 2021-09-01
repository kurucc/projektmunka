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
        <input type="hidden" name="id" value={{ $employees->id }}>
        <label>Felhasználónév</label><br>
        <input type="text" name="felhasználónév" id="" value={{ $employees->username }}><br>
        <label>Jelszó</label><br>
        <input type="password" name="jelszó" id="" placeholder="Jelszó..."><br>
        <label>Email</label><br>
        <input type="email" name="email" id="" value={{ $employees->email }}><br>
        <label>Születésnap</label><br>
        <input type="date" name="születésnap" id="" value={{ $employees->birthday }}><br>
        <label>Telefonszám</label><br>
        <input type="tel" name="tel" id="" value={{ $employees->tel }}><br>
        <label>Adószám</label><br>
        <input type="text" name="adószám" id="" value={{ $employees->tax_num }}><br>
        <label>Tajszám</label><br>
        <input type="text" name="tajszám" id="" value={{ $employees->SSN }}><br>
        <label>Bankszámlaszám</label><br>
        <input type="text" name="bankszámlaszám" id="" value={{ $employees->bank_account_number }}><br>
        <label>Jogkör</label><br>
        <input type="text" name="jogkör" id="" value={{ $employees->role }}><br>
        <input type="submit" value="Frissítés">
    </form>
@include('footer')