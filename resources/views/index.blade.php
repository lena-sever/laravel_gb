<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>

<body>

    <h3>
        <ul>
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><a href="{{ route('project') }}">О проекте</a></li>
            <li><a href="{{ route('cat.index') }}">Категории новостей</a></li>
        </ul>
    </h3>
    <h1>Hello GB!</h1>
    <p>возраст: {{$age}}
    </p>

</body>

</html>