<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</body>
</html>