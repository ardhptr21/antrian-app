<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title){{ $title }} @else Antrian App @endisset</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="font-sans antialiased">
    <main>
        @yield('content')
    </main>

    <script src="/js/script.js"></script>
</body>

</html>
