<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '商品管理')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('head')
</head>
<body>
    @yield('content')
    @yield('contact')
</body>
</html>
