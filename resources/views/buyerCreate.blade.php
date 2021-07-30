<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
</head>
<body>
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
</body>
</html>