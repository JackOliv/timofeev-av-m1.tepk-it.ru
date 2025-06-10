<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/decor.ico') }}">
</head>
<body>
<header>
<nav>
    <div>
        <img src="{{asset('assets/images/decor.png')}}" alt="logo" width="80 px">
    </div>
    <ul>
        <li><a href="{{route('products.index')}}">Продукты</a></li>
    </ul>
</nav>
</header>
<main>
    @yield('content')
</main>
</body>
</html>
