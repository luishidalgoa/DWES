<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts._partials.menu')

    <h1>@yield('title')</h1>
    <h2>This is @yield('title')</h2>


    @yield('body')
</body>
</html>