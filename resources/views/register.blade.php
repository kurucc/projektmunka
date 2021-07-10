<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BurkoLogic</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form method="post">
        @csrf
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="Mentés">
    </form>
</body>
</html>