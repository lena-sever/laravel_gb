<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все новости</title>
</head>
<body>
    <ol>
        @foreach ($news as $newsItem)
            <li><a href="{{ route('news.show', ['news' => $newsItem]) }}">({{$newsItem->category->title}}) {{ $newsItem->title }}</a></li>
        @endforeach
    </ol>
</body>
</html>