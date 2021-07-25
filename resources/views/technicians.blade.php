<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($techs as $tech)
        <p>{{ $tech->name }}</p>
        <p>{{ $tech->county }}</p>
    @endforeach
</body>
</html>