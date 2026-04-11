<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FashionablyLate')</title>

    <link rel="stylesheet" href="{{ asset('css/common/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="site-header">
        <div class="site-header__inner">
            <a href="{{ route('contact.index') }}" class="site-header__logo">
                FashionablyLate
            </a>

            <div class="site-header__nav">
                @guest
                    @if (request()->routeIs('register'))
                        <a href="{{ route('login') }}" class="site-header__button">
                            login
                        </a>
                    @elseif (request()->routeIs('login'))
                        <a href="{{ route('register') }}" class="site-header__button">
                            register
                        </a>
                    @endif
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="site-header__button">
                            logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="site-main">
        @yield('content')
    </main>

    @yield('script')
</body>

</html>