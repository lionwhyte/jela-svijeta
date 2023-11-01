<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meals</title>
</head>

<body>
    <h1>Meals</h1>
    @foreach ($meals['data'] as $meal)
    <h2>Title: {{ $meal['title'] }}</h2>
    <p>Description: {{ $meal['description'] }}</p>
    @endforeach


</body>

</html>