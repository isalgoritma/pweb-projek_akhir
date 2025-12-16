<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'UniVerse - Auth')</title>

    @stack('styles')
</head>

<body style="margin:0; padding:0; overflow-x:hidden; background:#f7efe3;">
    @yield('content')

    @stack('scripts')
</body>
</html>
