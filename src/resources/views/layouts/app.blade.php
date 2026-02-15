<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        @yield('title', 'FashionablyLate')
      </a>
      <nav>
        <ul class="header-nav">
          @if (Auth::check())
            <li class="header-nav__item">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="header-nav__button">logout</button>
              </form>
            </li>
          @endif
        </ul>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>
</html>