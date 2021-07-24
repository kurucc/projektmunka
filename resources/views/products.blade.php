<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    @foreach ($projects as $key => $value)
        <p>{{ $value->id }}</p>
        <p>{{ $value->name }}</p>
        <p>{{ $value->sale }}</p>
        <p>{{ $value->gross_price }}</p>
        <br>
    @endforeach

    {{ $projects->appends($_GET)->links()}}
</body>
</html>