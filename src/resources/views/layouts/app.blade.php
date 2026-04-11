<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/common/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="site-header">
    <div class="site-header__inner">
        <a class="site-header__logo" href="{{ route('contact.index') }}">FashionablyLate</a>

        @if (request()->routeIs('register'))
            <div class="site-header__nav">
                <a class="site-header__nav-link" href="{{ route('login') }}">login</a>
            </div>
        @elseif (request()->routeIs('login'))
            <div class="site-header__nav">
                <a class="site-header__nav-link" href="{{ route('register') }}">register</a>
            </div>
        @endif
    </div>
</header>

    <main>
        @yield('content')
    </main>
</body>

</html>