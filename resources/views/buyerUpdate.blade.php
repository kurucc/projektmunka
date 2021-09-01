@include('header')
    <form method="post">
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
        @csrf
        <input type="hidden" name="id" value={{ $buyers->id }}>
        <input type="text" name="felhasználónév" id="" value={{ $buyers->username }} required>
        <input type="password" name="jelszó" id="" required>
        <input type="email" name="email" id="" value={{ $buyers->email }} required>
        <input type="date" name="születésnap" id="" value={{ $buyers->birthday }} required>
        <input type="tel" name="tel" id="" value={{ $buyers->tel }}>
        <input type="text" name="név" id="" value={{ $buyers->name }}>
        <input type="text" name="delivery_zip" id="" value={{ $buyers->delivery_zip }} required>
        <input type="text" name="delivery_address" id="" value={{ $buyers->delivery_address }} required>
        <input type="text" name="delivery_city" id="" value={{ $buyers->delivery_city }} required>
        <input type="text" name="invoice_name" id="" value={{ $buyers->invoice_name }}>
        <input type="text" name="invoice_company" id="" value={{ $buyers->invoice_company }}>
        <input type="text" name="invoice_tax" id="" value={{ $buyers->invoice_tax }}>
        <input type="text" name="invoice_zip" id="" value={{ $buyers->invoice_zip }} required>
        <input type="text" name="invoice_city" id="" value={{ $buyers->invoice_city }} required>
        <input type="text" name="invoice_address" id="" value={{ $buyers->invoice_address }} required>
        <input type="submit" value="Frissítés">
    </form>
@include('footer')