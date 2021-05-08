<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все категории</title>
</head>

<body>

    <ul>
        @foreach ($category as $catItem)
        <li><a href="{{ route('cat.show', ['category' => $catItem]) }}"> {{ $catItem->title }}</a></li>
        @endforeach
    </ul>

</body>

</html>