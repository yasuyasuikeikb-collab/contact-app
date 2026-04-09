<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/common/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
    @stack('styles')
</head>

<body>
    <header class="site-header">
        <div class="site-header__inner">
            <a class="site-header__logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>