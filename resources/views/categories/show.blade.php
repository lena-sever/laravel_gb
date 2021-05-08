<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости категории: {{ $category->title }}</title>
</head>

<body>

    <p>Новости категории {{ $category->id }}:</p>
    <h1> {{ $category->title }}</h1>

    <div>
        @foreach ($news as $newsItem)
        <li><a href="{{ route('news.show', ['news' => $newsItem]) }}">{{ $newsItem->title }}</a></li>
        @endforeach
    </div>

</body>

</html>